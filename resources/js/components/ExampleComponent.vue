<template>
        <div class="container" id="advanced-search-form">
        <h1 style="text-align: center;
    color: black;
    font-weight: bold;">Sistema de acreditación</h1>
        <form @submit="formSubmitfirebase" enctype="multipart/form-data">
            <div class="form-group">
                <label for="fu">Fuerza</label> 
                <select class="form-control" id="fu" name="fu" v-model="fuerza"> 
                    <option value="1">Armada Boliviana</option>
                    <option value="2">Ejercito</option>
                    <option value="3">Aerea</option>
                 </select>
            </div>
            <div class="form-group">
                <label for="gra">Grado (abreviado)</label>
                <input type="text" class="form-control" placeholder="Ingrese su grado" id="gra" name="gra" v-model="grado">
                <p class="text-danger" v-if="grado.length==0">Debe registrar este dato</p>
            </div>
            <div class="form-group">
                <label for="nom">Nombres</label>
                <input type="text" class="form-control" placeholder="Ingrese su nombre" id="nom" name="nom"  v-model="nombres">
                <p class="text-danger" v-if="nombres.length==0">Debe registrar este dato</p>
            </div>
            <div class="form-group">
                <label for="ap">Apellido Paterno</label>
                <input type="text" class="form-control" placeholder="Ingrese su apellido paterno" id="ap" name="ap" v-model="apaterno">
                <p class="text-danger" v-if="apaterno.length==0">Debe registrar este dato</p>
            </div>
            <div class="form-group">
                <label for="am">Apellido Materno</label>
                <input type="text" class="form-control" placeholder="Ingrese su apellido materno" id="am" name="am" v-model="amaterno">
                 <p class="text-danger" v-if="amaterno.length==0">Debe registrar este dato</p>
            </div>
            <div class="form-group">
                <label for="number">Numero de carnet de identidad</label>
                <div>
                    <input type="number" class="form-control" placeholder="Ingrese su numero de carnet de identidad" id="number" style="display: inline-block;" v-model="ci">
                    <p class="text-danger" v-if="ci.length==0">Debe registrar este dato</p>
                    <select class="form-control" id="fu" name="fu" style="    display: inline-block;" v-model="ciext"> 
                    <option value="CH">Chuquisaca</option>
                    <option value="LP">La Paz</option>
                    <option value="CB">Cochabamba</option>
                    <option value="OR">Oruro</option>
                    <option value="PT">Potosí</option>
                    <option value="TJ">Tarija</option>
                    <option value="SC">Santa Cruz</option>
                    <option value="BE">Beni</option>
                    <option value="PD">Pando</option>
                 </select>
                </div>
                
            </div>
            <div class="form-group">
                <label for="fileon">Fotografia  <span style="color:red;font-size: larger;">FONDO ROJO</span> </label>
                <input type="file" class="form-control" accept="image/*" name="foto" id="fileon" ref="fileon" @change="onfilefoto">
                <label style="color: #4a36f4;
    font-size: medium;">La fotografía debe ser con el uniforme Nº 3 ARMADA y Nº 4 EJERCITO - AEREA</label>
            </div>
            
            
            <div class="clearfix"></div>
            <button v-if="validadatos" type="submit" class="btn btn-info btn-lg btn-responsive"  > <span class="glyphicon glyphicon-ok"></span> Acreditar</button>
        </form>
    </div>
</template>

<script>
    export default {
        data (){
            return {
                fuerza:1,
                grado:"",
                nombres:"",
                apaterno:"",
                amaterno:"",
                ci:0,
                ciext:"LP",
                foto:"",
                referencia:null
            }
        },
        methods: {
                readFileAsync(file) {
                    return new Promise((resolve, reject) => {
                        let reader = new FileReader();
                        reader.onload = () => {
                            resolve(reader.result);
                        };
                        reader.onerror = reject;
                        reader.readAsArrayBuffer(file);
                    })
                },
            onfilefoto(){    
                this.foto = this.$refs.fileon.files[0];  
            },
            formSubmitfirebase(e){
                 e.preventDefault(); 
                Vue.swal({ 
                        title: "Subiendo fotografia",
                        html:'<div class="progress"><div id="save" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 0%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">0%</div></div> <span id="text_saving" style="font-size: 13px;"></span>',
                        allowOutsideClick: ()=> false,
                        allowEscapeKey: ()=> false,
                        didOpen: ()=> {
                            Vue.swal.showLoading()
                        }
                        }); 
                        let me=this; 
                  this.cargarfoto(this.foto);
                 
            },cargarfoto(file){
                let me=this;
               var namefoto= Math.floor(Math.random() * 100000000000); 
               var uploadTask =this.referencia.child('img'+namefoto+'.png').put(file);
               uploadTask.on('state_changed',
                (snapshot) => { 
                    var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100; 
                    $('.progress-bar[id="save"]').css('width', parseInt(progress)+'%').attr('aria-valuenow', parseInt(progress)).text(parseInt(progress)+'%');  
                },
                (error) => {
                   console.log("error",error);
                    Vue.swal({
                                        icon: 'error',
                                        title: 'Error de registro',
                                        text: error,
                                        allowOutsideClick: () => false,
                                        allowEscapeKey: () => false,
                                    }).then((result) => {
                                        window.location.reload(true);
                                    })
                },
                () => { 
                    Vue.swal({ 
                        title: "Registrando acreditación",
                        allowOutsideClick: ()=> false,
                        allowEscapeKey: ()=> false,
                        didOpen: ()=> {
                            Vue.swal.showLoading()
                        }
                        }); 
                    uploadTask.snapshot.ref.getDownloadURL().then((downloadURL) => {
                    console.log('File available at', downloadURL);
                     me.saveinfo('img'+namefoto+'.png',downloadURL)
                    });
                }
                );
            },
            saveinfo(foto,ruta){ 
                            axios.post('/upimage', {
                                    ruta: ruta,
                                    foto: foto,
                                    fuerza: this.fuerza,
                                    grado: this.grado,
                                    nombres: this.nombres,
                                    apaterno: this.apaterno,
                                    amaterno: this.amaterno,
                                    ci: this.ci,
                                    ciext: this.ciext
                                }).then(function (response) {
                                    Vue.swal({
                                        icon: 'success',
                                        title: 'Registro exitoso',
                                        allowOutsideClick: () => false,
                                        allowEscapeKey: () => false,
                                    }).then((result) => {
                                        window.location.reload(true);
                                    })
                                    //    
                                }).catch(function (error) {
                                    console.log("error:", error);
                                    Vue.swal({
                                        icon: 'error',
                                        title: 'Error de registro',
                                        text: error,
                                        allowOutsideClick: () => false,
                                        allowEscapeKey: () => false,
                                    }).then((result) => {
                                        window.location.reload(true);
                                    })
                                });
            }
        },
        computed: {
           validadatos:function () {
               return (this.amaterno.length>0
               &&this.apaterno.length>0
               &&this.ci>0 
               &&this.nombres.length>0
               &&this.grado.length>0
               &&(this.foto instanceof File));
           }
        },
        mounted(){ 
            this.referencia=window.storage.ref(); 
}
    }
</script>
