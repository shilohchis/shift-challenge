<template>
    <div class="contain">
        <b-card no-body class="card-body" style="border-style: none;">
            <div class="">
                <b-card-title class="header-title">Your Perspective</b-card-title>
                <b-card-text class="header-desc">Your Perspective Type is {{ final }}</b-card-text>
            </div>
            <div class="info-wrapper">
                <div class="info-child-wrapper left-wrapper">
                    <b-card-text class="info">Introversion (I)</b-card-text>
                    <b-card-text class="info">Sensing (S)</b-card-text>
                    <b-card-text class="info">Thinking (T)</b-card-text>
                    <b-card-text class="info">Judging (J)</b-card-text>
                </div>
                <div class="info-child-middlewrapper">
                    <Slide :is_left="is_intraversion"/>
                    <Slide :is_left="is_sensing"/>
                    <Slide :is_left="is_thinking"/>
                    <Slide :is_left="is_judging"/>
                </div>
                <div class="info-child-wrapper right-wrapper">
                    <b-card-text class="info">Extraversion (E)</b-card-text>
                    <b-card-text class="info">Intuition (N)</b-card-text>
                    <b-card-text class="info">Feeling (F)</b-card-text>
                    <b-card-text class="info">Perceiving (P)</b-card-text>
                </div>
            </div>
        </b-card>
    </div>
</template>

<script>
import Slide from './components/Slide'

export default {
    name: 'Result',
    props: {
        id: Number,
        final: String,
        is_intraversion: Boolean,
        is_sensing: Boolean,
        is_thinking: Boolean,
        is_judging: Boolean
    },
    components: {
        Slide
    }
}
</script>

<style lang="scss" scoped>
* {
    font-family: Roboto;
}
.contain {
    border: 1px solid #E5E5E5;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    margin: 4rem 3rem;
}
.info-wrapper {
    display: flex;
    flex-direction: row;
    justify-content: flex-end;
}
.info-child-wrapper {
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.info-child-middlewrapper {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.left-wrapper {
    margin-right: 4rem;
}
.right-wrapper {
    margin-left: 2rem;
    margin-right: 3rem;
}
.card-body {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    padding: 4.5rem 3rem;
}
.header-title {
    color: #113264;
    font-size: 26px;
}
.header-desc {
    color: #343A40;
    font-size: 16px;
}
.info {
    color: #878787;
    font-size: 14px;
}
</style>
