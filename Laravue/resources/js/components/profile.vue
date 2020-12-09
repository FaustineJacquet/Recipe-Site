<template>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="card">

                    <div class="card-header">Profile image</div>

                    <div>

                      <div class="card card-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header text-white">
                           <div class="widget-user-image">
                            <img class="rounded-circle" :src="getProfilePhoto()" alt="...">
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <div class="col-md-5" style="margin-top: 2vh;">
     <div class="card">
        <div class="card-body">
           <div class="tab-content">
            <h3 style="font-weight: bold; margin-bottom: 2vh;">Personal informations :</h3>
            <h5>Name : {{ name }}</h5>
            <h5>Email : {{ email }}</h5>

        </div>
    </div>
</div>
<div class="card" style="margin-top: 2rem;">
    <div class="card-body">
       <div class="tab-content">

        <div class="form-group">
            <label for="photo" class="control-label"><h3 style="font-weight: bold; margin-bottom: 2vh;">Choose your avatar</h3></label>
            <div class="col-sm-12">
                <input type="file" @change="updateProfile" name="photo" class="form-input">
            </div>

        </div>
    </div>
</div>
</div>
</div>


</div>
</div>
</template>

<script>
    export default {
        data: function(){
            return{
                id:'',
                name : '',
                type: '',
                photo: ''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {

            getProfilePhoto(){
                let picture = (this.photo.length > 200) ? this.photo : "../../../public/images/profile/" + this.photo ;
                return picture;
            },

            updateProfile(event){
                let file = event.target.files[0];
                let reader = new FileReader();
                reader.onloadend = (file) => {
                    this.photo = reader.result;
                }
                reader.readAsDataURL(file);
            },

        }
    }
</script>

<style>

</style>

