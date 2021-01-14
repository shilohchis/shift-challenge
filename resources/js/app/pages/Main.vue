<template>
    <div>
        <b-card style="border-style: none;">
            <b-card-title class="header-title">Discover Your Perspective</b-card-title>
            <b-card-text class="header-desc">Complete the 7 min test and get a detailed report of your lenses on the world.</b-card-text>
        </b-card>
        <Quest/>
    </div>
</template>

<script>
import Quest from './components/Quest'

export default {
    name: 'Main',
    components: {
        Quest,
    },
}
</script>

<style lang="scss" scoped>
* {
    font-family: Roboto;
}

.header-title {
    color: #113264;
    font-size: 18px;
}

.header-desc {
    color: #495057;
    font-size: 16px;
}
</style>
