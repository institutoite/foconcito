//En tu código tienes:

dtTable12.rows().nodes()

//Creo que solo con $(dtTable12).DataTable().rows() ya obtendrías la lista de todos los rows, pero dtTable12 ¿qué valor tiene ?, puedes poner directo con el id como en mi ejemplo.

//Te anexo mas información al respecto para que la tomes en cuenta, espero que te pueda ayudar, saludos.

//En mi caso con el siguiente codigo:

$("#example").DataTable().rows()
//Obtengo todas las filas o renglones de la tabla, y con este codigo:

$("#example").DataTable().rows({ filter: 'applied' }).nodes()
//Obtengo solo los filtrados.

//Prueba con el siguiente ejemplo, filtra con el combo y checa en la consola el número de rows que estoy retornando.

$(document).ready(function() {
  $("#btnObtenerValores").click(function(){
    //var columna = $("#txtColumna").val();
    var columna = parseInt($("#cboHeaders").val());
    columna = isNaN(columna) ? 0 : columna;
    ObtenerValoresDataTable(columna);
  });


  // Setup - add a text input to each footer cell
  //$('#example tfoot th').each(function() { //Con este ejemplo poniendo en el footer del grid
  var headers = [];
  $('#example thead th').each(function() {
    var title = $(this).text();
    headers.push(title);
    //Si es la columna Office <-- aqui pongo el combo
    if (title == 'Office') {
      //$(this).html('<input type="text" placeholder="Search ' + title + '" />');

      //Recorro todos los rows para obtener los valores
      ObtenerValoresCombo(2,true);
      var combo = '<select style="width:100%">';
        combo += '<option id="0"></option>'
      $.each(valoresCombo, function(i, v) {
        combo += '<option id="' + i + '">' + v + '</option>'
      });
      combo = combo + '</select>';

      $(this).html(combo);
    }
  });
  
  //Pongo la lista de encabezados en el combo de Headers
  //console.log(headers);
  var datosHeader= '';
  $.each(headers, function(i, v) {
    datosHeader += '<option value="' + i + '">' + v + '</option>'
  });
  $("#cboHeaders").append(datosHeader);
      
  // DataTable
  var table = $('#example').DataTable({
	  sort:false
  });

  // Apply the search
  table.columns().every(function() {
    var that = this;

	$('select', this.header()).on('keyup change', function() {
      if (that.search() !== this.value) {
        that
          .search(this.value)
          .draw();
		  
		console.log("Filas Totales: " + $("#example").DataTable().rows().count()
		     + "\nFilas Filtradas: " + $("#example").DataTable().rows( { filter : 'applied'} ).nodes().length);
      }
    });
	/*
	//Ejemplo con el footer
    $('select', this.footer()).on('keyup change', function() {
      if (that.search() !== this.value) {
        that
          .search(this.value)
          .draw();
      }
    });*/
	
	
	
  });
	//alert("Filas: " + $("#example").dataTable().rows().count());
});



var valoresCombo = [];

//Esta funcion solo FILTRA dentro de los valores mostrados, por eso se ejecuta solo la primera vez, cuando el grid tiene toda la informacion
function ObtenerValoresCombo(columna,showAlert) {
	valoresCombo = [];
	$('#example tbody tr').each(function(indiceFila) {
		$(this).children('td').each(function(indiceColumna) {
			if(indiceColumna == columna){//Indice de la columna Office
				valoresCombo.push($(this).text());
			}
		});
	});
	
	//Remuevo los duplicados
	valoresCombo = valoresCombo.unique();
  if(showAlert){
    alert(valoresCombo);
  }
};


//Para recorrer TODA la informacion sin importar el pagina hay que tomar de base lo siguietne y no el grid como objeto WEB si no como objeto DataTable
function ObtenerValoresDataTable(columna) {
  //console.log(columna);
	var valores = [];
  
  //Obtengo toda la infromacion del GRID TR HTML
  //si esta activo deferRender: true entonces regresara 
  //                            solo la informacion de las paginas del grid vistas
  //var rows = $("#example").dataTable().fnGetNodes();  
  
  //Obtengo los valores del grid sin elemento html
  var rows = $("#example").dataTable().fnGetData()
  //console.log(rows);
    
	$(rows).each(function() {
    valores.push($(this)[columna]);
	});
	
	//Remuevo los duplicados
	valores = valores.unique();
  
  //$("#result").text(valores);
  
  var datosResult= '';
  $("#cboResults").html('');
  $.each(valores, function(i, v) {
    datosResult += '<option value="' + i + '">' + (i+1) +'-' + v + '</option>'
  });
  $("#cboResults").append(datosResult);
};

Array.prototype.unique=function(a){
  return function(){return this.filter(a)}}(function(a,b,c){return c.indexOf(a,b+1)<0
});