<template>
    <div class="wrapper mt-4">
        <b-alert v-model="showAlert" variant="danger" dismissible>
            System Error!
        </b-alert>
        <b-card v-for="(q, index) in questions" :key="q.id">
            <b-card-title class="header-title">{{ q.desc }}</b-card-title>
            <div class="card-wrapper">
                <span class="red text">Disagree</span>
                <b-form-group v-slot="{ ariaDescribedby }">
                    <b-form-radio-group required>
                        <b-form-radio v-for="item in scales" :value="item" :key="item" v-model="value[index]"></b-form-radio>
                    </b-form-radio-group>
                </b-form-group>
                <span class="green text">Agree</span>
            </div>
            <small class="error-text" v-show="errors.value[index].show">{{ errors.value[index].text }}</small>
        </b-card>
        <b-card class="bb">
            <b-card-title class="header-title grey">Your Email</b-card-title>
            <b-form-input class="email" v-model="email" placeholder="you@example.com" name="email" required></b-form-input>
            <small class="error-text" v-show="errors.email.show">{{ errors.email.text }}</small>
        </b-card>
        <div class="submit-wrapper" @click="onSubmit()">
            <button class="submit button btn">Save & Continue</button>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Quest',
    data() {
        return {
            showAlert: false,
            email: "",
            id: [],
            value: [],
            scales: new Array(7).fill(0).map((item, index) => index + 1),
            questions: [],
            errors: {
                email: {
                    text: "Please fill with your active email",
                    show: false
                },
                value: []
            },
            allowSubmit: true
        }
    },
    mounted: async function() {
        try {
            const text = "Please select one"
            const resp = await axios.get('/api/questions')
            if(resp.status == 200) {
                this.questions = resp.data.data
                this.id = resp.data.data.map(item => item.id)
                this.value = new Array(resp.data.data.length).fill(0)
                this.errors.value = new Array(resp.data.data.length).fill({ text, show: false })
            }
        } catch (e) {
            this.showAlert = true;
        }
    },
    methods: {
        async onSubmit() {
            try {
                if(!this.email) {
                    this.errors.email.show = true
                    this.allowSubmit =  false
                }
                if(this.value.find(item => item == 0) != undefined) {
                    this.errors.value = this.errors.value.map(item => { return { ...item, show: true } })
                    this.allowSubmit =  false
                } else {
                    if(this.allowSubmit) {
                        const data = { email: this.email }
                        data.answers = this.id.map((val, idx) => { return { id: this.id[idx], value: val } })
                        const resp = await axios.post('/api/answers', data)
                        if(resp.status == 201) {
                            this.$router.push({ name : 'personality.result', params: resp.data.data })
                        }
                    }
                }
                this.allowSubmit = true
            } catch (e) {
                this.showAlert = true;
            }
        },
        onReset(event) {
            event.preventDefault()
            this.email = ''
            this.value = this.value.map(item => 0)
        }
    },
}
</script>

<style lang="css" scoped>
* {
    font-family: Nunito;
}
.wrapper {
    width: 50%;
    margin: auto;
}
.submit-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 4rem;
}
.card-wrapper {
    display: flex;
    flex-direction: row;
    justify-content: center;
}
.header-title {
    font-size: 18px;
    text-align: center;
}
.card {
    padding: 1.5rem 5rem;
    border-top: 1px solid #E5E5E5;
    border-left: 1px solid #E5E5E5;
    border-right: 1px solid #E5E5E5;
    border-bottom: none;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;
}
.email::placeholder {
    color: #E5E5E5;
}
.bb {
    border-bottom: 1px solid #E5E5E5;
}
.text {
    font-size: 14;
}
.red {
    color: #FA4344;
    margin-right: 1.5rem;
}
.green {
    color: #00A079;
    margin-left: .5rem;
}
.grey {
    color: #495057;
}
.submit {
    background-color: #3D59FA;
    color: white;
    padding-left: 1.5rem;
    padding-right: 1.5rem;
}
.error-text {
  color: #B00020;
}
</style>
