const { parseHTML } = require("jquery");

$(function () {

const more = $('.more-articles')

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

function getCards(){
return new Promise((resolve,reject)=>{
    {
        $.ajax({
        type:'get',
        url: "{{route('get.cards')}}",
        data: true,
        cache:false,
        contentType: 'json',
        processData: false})
        .done((data) => {
        let cartas = data.cartas;
        resolve(cartas);
        })
        .fail((error)=>{
        reject(error);
        })
    }
})
}



more.on('click', async () => {
await getCards().then((cartas) => {
cartas.forEach(carta => {   
console.log(carta);  
let row = parseHTML(`
              @component('components.cards')
                @slot('articleTitle','${card.title}')
                @slot('shortArticleText', '${card.short_description}') 
                @slot('articleImage','${card.imageRoute}')
                @slot('category','${card.category}')
                @slot('id','${toString(card.id)}')
              @endcomponent
            `);
    $(".cards").append(row);
    parseInt()
    parseHTML
})


console.log('Se ejecuto el ajax con exito');



}).catch((error) => {
console.error(error);
});
});

more.on( "mouseup", function() {      
$( this ).css('background-color', '#00000000');
} )
.on( "mousedown", function() {
$( this ).css('background-color', '#3c7a66');
} );



});



