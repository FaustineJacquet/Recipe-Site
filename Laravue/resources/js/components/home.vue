<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                     <b-avatar class="text" :src="require('../../../storage/app/public/image/bowl.jpg')" size="5rem"></b-avatar>
                     <b-avatar class="text" :src="require('../../../storage/app/public/image/hamburger.jpeg')" size="5rem"></b-avatar>
                     <b-avatar class="text" :src="require('../../../storage/app/public/image/macaron.jpg')" size="5rem"></b-avatar>

                     <h1 class="text" style="margin-left: 3vw; margin-right: 3vw; font-weight: bold;">Recipes</h1>

                     <b-avatar class="text" :src="require('../../../storage/app/public/image/salad.jpeg')" size="5rem"></b-avatar>
                     <b-avatar class="text" :src="require('../../../storage/app/public/image/diet.jpg')" size="5rem"></b-avatar>                 
                     <b-avatar class="text" :src="require('../../../storage/app/public/image/crepe.jpg')" size="5rem"></b-avatar>


                 </div>

                 <div>

                    <h1 style="margin-top: 2vh; margin-bottom: 2vh; text-align: center;">I'll show every recipes which have been posted</h1>

                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>

.text{
    display: inline-block;
    margin-top: -1vh;
    margin-left: 1vw;
    margin-right: 1vw;
}
html, body{
    background-color: #fafafa;
}

</style>