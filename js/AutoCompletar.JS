$( function() {
    // Vector contiene las nacionalidades y sus paises
   var Nacionalidad=["andorrano-Andorra",
"belga",
"bosnio",
"británico",
"búlgaro",
"danés",
"alemán",
"estonio",
"finés",
"francés",
"griego",
"irlandés",
"islandés",
"italiano",
"croata",
"letonio",
"liechtensteiniano",
"lituano",
"luxemburgés",
"maltés",
"macedonio",
"moldavo",
"monaqués",
"montenegrino",
"holandés",
"noruego",
"austriaco",
"polaco",
"portugués",
"rumano",
"ruso",
"sanmarinense",
"sueco",
"suizo",
"serbio",
"eslovaco",
"eslovaco",
"español",
"checo",
"turco",
"ucraniano",
"húngaro",
"vaticano",
"bieloruso",
"greco",
"chipriota",
"Significado",
"americano",
"antiguano",
"argentino",
"bahameño",
"barbadense",
"beliceño",
"boliviano",
"brasileño",
"costarricense",
"chileno",
"dominiqués",
"dominicano",
"ecuatoriano",
"granadino",
"groenlandés",
"guatemalteco",
"guañano",
"haitiano",
"hondureño",
"jamaicano",
"canadiense",
"colombiano",
"cubano",
"mexicano",
"nicaraguense",
"panameño",
"paraguayo",
"peruano",
"salvadoreño",
"surinamés",
"uruguayo",
"venezolano",
"sanvicentino",
"egipcio",
"argelino",
"angolano",
"ecuatoguineano",
"etíope",
"beninés",
"botsuano",
"burkinés",
"burundés",
"eritreo",
"gabonés",
"gambiano",
"ghanés",
"Guineano",
"Guineano",
"marfileño",
"camerunés",
"caboverdiano",
"keniata",
"comorense",
"congoleño",
"lesotense",
"liberiano",
"libio",
"malgache",
"malauí",
"maliense",
"marroquí",
"mauritano",
"mauriciano",
"mozambiqueño",
"namibio",
"nigeriano",
"ruandés",
"zambiano",
"senegalés",
"seychelense",
"sierraleonés",
"zimbabuense",
"somalí",
"sudafricano",
"sudanés",
"suazi",
"tanzano",
"togolés",
"chadiano",
"tunecino",
"ugandés",
"centroafricano",
"laosiano",
"libanés",
"afgano",
"armenio",
"azerbaiyano",
"bareiní",
"bangladesí",
"bruneano",
"chino",
"georgiano",
"indio",
"indionisio",
"iraquí",
"iraní",
"israelí",
"japonés",
"jemení",
"jordano",
"camboyano",
"kazajo",
"katarí",
"kirguís",
"kuwaití",
"malayo",
"maldivo",
"mongól",
"birmano",
"norcoreano",
"omanés",
"pakistaní",
"filipino",
"saudí",
"singapurense",
"ceilandés",
"surcoreano",
"sirio",
"tailandés",
"timorense",
"uzbeco",
"vietnamita",
"australiano",
"kiribatiano",
"marshalés",
"nauruano",
"neozelandés",
"niuano",
"papú",
"salomonense",
"samoano",
"tongano",
"tuvaluano",
"vanuatuense"];

//Se indica el Input Donde se aplicara la funcion de autocompletar
   $( "#NacionalidadClienteParticularRegistro" ).autocomplete({
     source: Nacionalidad
   });
   $( "#HabilitarDepartamentoDatosCliente" ).autocomplete({
     source: Nacionalidad
   });
   $( "#NacionalidadHuespedHuespedExtras" ).autocomplete({
     source: Nacionalidad
   });
   $( "#NacionalidadHuespedConReserva" ).autocomplete({
    source: Nacionalidad
  });
  $( "#NacionalidadHuesped" ).autocomplete({
    source: Nacionalidad
  });
  $( "#NacionalidadHuespedHuespedActualizar" ).autocomplete({
    source: Nacionalidad
  });
  
 
/*  console.log("hola"); */
} );