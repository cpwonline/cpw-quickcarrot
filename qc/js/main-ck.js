window.addEventListener("load", function(){
  initCkEditor(); //init ckeditor

  var btn = document.querySelector("#send");

  btn.addEventListener("click", function(){
    var content = CKEDITOR.instances.editor.getData();  
    document.querySelector("#content").value = encodeURI(content);
    document.querySelector("form").submit();
  });

  var type = document.querySelector("#type");
  type.addEventListener("change", verTipo);
  function verTipo(){
    var display = (this.value == 'PAGE') ? "none" : "block";
    var el = document.querySelectorAll(".only-post");
    for(var i = 0; i < el.length; i++){
      el[i].style.display = display;
    }
  }
  var event = new CustomEvent("change");
  type.dispatchEvent(event);
});