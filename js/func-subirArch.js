function subirArch(contArch, url, divProgreso, tipo){
    this.iniciarArch = function(){
      //Se llama a subir cuando cambie el estado del input
		    contArch.addEventListener('change', subirArch, false);
    }
    this.subirArch = function(e){
      //Datos
        var archivos=e.target.files;
        var archivo=archivos[0];
      //Instancias para formulario
        var datos = new FormData();
      //Cargamos archivos para ser enviados
        datos.append('archivo',archivo);
        /*datos.append('id', id);//Algúna información extra*/
      //Dirección y procesamiento de datos
        var solicitud = new XMLHttpRequest();
        var xmlupload = solicitud.upload;
      //Estados de la carga
        xmlupload.addEventListener('loadstart',comenzarArch,false);
        xmlupload.addEventListener('progress',estadoArch,false);
        xmlupload.addEventListener('load',mostrarArch,false);
      //Envío y tipo de envío
        solicitud.open("POST", url, true);
        solicitud.send(datos);
    }
    this.comenzarArch = function(){
      divProgreso.innerHTML='<progress tag="pro_imagen" value="0" max="100">0%</progress>';
    }
    this.estadoArch = function(e){
      if(e.lengthComputable){
        var por=parseInt(e.loaded/e.total*100);
        var barraProgreso=divProgreso.querySelector("progress[tag=pro_imagen]");
        barraProgreso.value=por;
        barraProgreso.innerHTML=por+'%';
      }
    }
    function mostrar(e){
      cajadatos.innerHTML=Tipo + " guardado(a) correctamente";
    }
}
