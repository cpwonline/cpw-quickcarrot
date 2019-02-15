//Estadísticas
    //Inicializando variables
        var todo = [], principal = [], otros = [];
        var v1 = [], v2 = [], v3 = [], v4 = [];
        var u1 = [], u2 = [], u3 = [], u4 = [];
    //Funciones
        //Función que separa valores
            function sepVal(valor, separador, mult){
                var array = [];
                var cont = 0, num = "";
                for(var a = 0; a < valor.length; a++){
                    if(valor[a] != separador){
                        num += valor[a];
                    }else{
                        mult == true? array[cont] = num * 1 : array[cont] = num;
                        cont++;
                        num = "";
                    }
                    if(a == (valor.length -1) && valor[a] != separador)
                        mult == true? array[cont] = num * 1 : array[cont] = num;
                }
                cont = 0;
                num = "";
                return array;
            }
        //Función para recargar las estadísticas
            function recSt(){
                //Ayer
                    const d_ayer = {
                        labels: ["12am-4am", "4am-8am", "8am-12pm", "12pm-4pm",
                            "4pm-8pm", "8pm-12am"
                        ],
                        datasets: [
                            {
                                name: "Pág. Principal", type: "bar",
                                //values: [35, 10, 34, 34, 12, 43]
                                values: v1
                            },
                            {
                                name: "Otras págs.", type: "line",
                                //values: [25, 40, 30, 35, 8, 54]
                                values: u1
                            }
                        ]
                    };
        
                    const c_ayer = new frappe.Chart("#e_ayer", {  // or a DOM element,
                                                                // new Chart() in case of ES6 module with above usage
                        title: "Estadísticas de ayer",
                        data: d_ayer,
                        type: 'axis-mixed', // or 'bar', 'line', 'scatter', 'pie', 'percentage'
                        height: 250,
                        colors: ['#7cd6fd', '#743ee2']
                    });
                //Semana
                    const d_semana = {
                        labels: ["Lunes", "Martes", "Miércoles", "Jueves",
                            "Viernes", "Sábado", "Domingo"
                        ],
                        datasets: [
                            {
                                name: "Pág. Principal", type: "bar",
                            //values: [25, 40, 30, 35, 8, 52, 17]
                                values: v2
                            },
                            {
                                name: "Otras págs.", type: "line",
                                //values: [25, 50, -10, 15, 18, 32, 27]
                                values: u2
                            }
                        ]
                    };
        
                    const c_semana = new frappe.Chart("#e_semana", {  // or a DOM element,
                                                                // new Chart() in case of ES6 module with above usage
                        title: "Estadísticas de la semana pasada",
                        data: d_semana,
                        type: 'axis-mixed', // or 'bar', 'line', 'scatter', 'pie', 'percentage'
                        height: 250,
                        colors: ['#7cd6fd', '#743ee2']
                    });
                //Mes
                    const d_mes = {
                        labels: ["1 semana", "2 semana", 
                            "3 semana", "4 semana"
                        ],
                        datasets: [
                            {
                                name: "Pág. Principal", type: "bar",
                                //values: [25, 40, 30, 35]
                                values: v3
                            },
                            {
                                name: "Otras págs.", type: "line",
                                //values: [25, 50, -10, 15]
                                values: u3
                            }
                        ]
                    };
        
                    const c_mes = new frappe.Chart("#e_mes", {  // or a DOM element,
                                                                // new Chart() in case of ES6 module with above usage
                        title: "Estadísticas del mes pasado",
                        data: d_mes,
                        type: 'axis-mixed', // or 'bar', 'line', 'scatter', 'pie', 'percentage'
                        height: 250,
                        colors: ['#7cd6fd', '#743ee2']
                    });
                //Año
                    const d_agno = {
                        labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
                            "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
                        ],
                        datasets: [
                            {
                                name: "Pág. Principal", type: "bar",
                                //values: [253, 403, 303, 35, 324, 564, 234, 655, 2314, 645, 342, 123]
                                values: v4
                            },
                            {
                                name: "Otras págs.", type: "line",
                                //values: [2243, 433, 323, 4355, 344, 5454, 4534, 6455, 2314, 665, 352, 126]
                                values: u4
                            }
                        ]
                    };
        
                    const c_agno = new frappe.Chart("#e_agno", {  // or a DOM element,
                                                                // new Chart() in case of ES6 module with above usage
                        title: "Estadísticas del año pasado",
                        data: d_agno,
                        type: 'axis-mixed', // or 'bar', 'line', 'scatter', 'pie', 'percentage'
                        height: 250,
                        colors: ['#7cd6fd', '#743ee2']
                    });
            }
        //Consulta de datos
            function verEst(){
                //Todo
                    //Llamada AJAX
                        $.post("enlaces/st.php", {null:null}, function(r){
                            //Separamos los datos en cuatro partes
                                todo = sepVal(r, ".");
                                principal = sepVal(todo[0], ",");
                                otros = sepVal(todo[1], ",");
                            //Hallamos los datos separándolos
                                //Principal
                                    for(var a = 0; a < principal.length; a++){
                                        switch(a){
                                            case 0:
                                                v1 = sepVal(principal[a], "-", true);
                                                u1 = sepVal(otros[a], "-", true);
                                                break;
                                            case 1:
                                                v2 = sepVal(principal[a], "-", true);
                                                u2 = sepVal(otros[a], "-", true);
                                                break;
                                            case 2:
                                                v3 = sepVal(principal[a], "-", true);
                                                u3 = sepVal(otros[a], "-", true);
                                                break;
                                            case 3:
                                                v4 = sepVal(principal[a], "-", true);
                                                u4 = sepVal(otros[a], "-", true);
                                                break;
                                        }
                                    }
                                    recSt();
                        });
            }