<template>
    <div>
        <slider/>
        <about/>
        <choose/>
    </div>
    
</template>
<script>
import slider from '../slider'
import about from '../about'
import choose from '../choose'
export default {
    
    name:"main",
    components:{
        slider,
        about,
        choose,
    }
}
</script>