<template>
        <div class="container" id="advanced-search-form">
        <h1 style="text-align: center;
    color: black;
    font-weight: bold;">Sistema de acreditación</h1>
        <form>
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
            <button v-if="validadatos" type="button" class="btn btn-info btn-lg btn-responsive" @click="onacreditar" > <span class="glyphicon glyphicon-ok"></span> Acreditar</button>
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
            }
        },
        methods:{
            onfilefoto(e){   
                this.foto = e.target.files[0];
                console.log(this.foto instanceof File);
            },
            onacreditar(){ 
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                } 
                let formData = new FormData();
                formData.append('file', this.foto);
                formData.append('fuerza', this.fuerza);
                formData.append('grado', this.grado);
                formData.append('nombres', this.nombres);
                formData.append('apaterno', this.apaterno);
                formData.append('amaterno', this.amaterno);
                formData.append('ci', this.ci);
                formData.append('ciext', this.ciext); 
   
                axios.post('/upimage', formData, config)
                .then(function (response) {
                   console.log("response:",response);
                })
                .catch(function (error) {
                    console.log("error:",error);
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
        }
    }
</script>
