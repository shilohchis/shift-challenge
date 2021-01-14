<template>
    <div class="slide-container">
        <div class="slide slide1" :class="is_left ? 'purple' : 'grey'"></div>
        <div class="slide slide2" :class="is_left ? 'grey' : 'purple'"></div>
    </div>
</template>

<script>
export default {
    name: 'Slide',
    props: {
        is_left: Boolean
    }
}
</script>

<style lang="scss" scoped>
.slide-container {
    display: flex;
    flex-direction: row;
}
.slide {
    width: 6rem;
    height: 1rem;
}
.slide1 {
    border-top-left-radius: 3px;
    border-bottom-left-radius: 3px;
}
.slide2 {
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
}
.grey {
    background-color: #E9ECEF;
}
.purple {
    background-color: #A920CB;
}
</style>
