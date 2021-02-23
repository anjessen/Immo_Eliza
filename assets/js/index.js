
document.getElementById('garden_yes').addEventListener('click', function(){
    document.getElementsByClassName("display")[0].style.display = 'inline';
})
document.getElementById('garden_no').addEventListener('click', function(){
   document.getElementsByClassName("display")[0].style.display = 'none';
})
document.getElementById('terrace_yes').addEventListener('click', function(){
    document.getElementsByClassName("display")[1].style.display = 'inline';
})
document.getElementById('terrace_no').addEventListener('click', function(){
    document.getElementsByClassName("display")[1].style.display = 'none';
})



const type_of_property = document.getElementById("type_of_property");
const number_of_rooms = document.getElementById("Number_of_rooms");
const house_area = document.getElementById("house-area");
const inputCityPC = document.getElementById("inputCityPC")

document.getElementById('Type_of_property').addEventListener('click', function(){
    if (type_of_property == NULL || number_of_rooms == NULL || house_area == NULL || inputCityPC == NULL)
    {
        document.getElementByClass("error").innerHTML = `<p class="error">Vous n'avez pas remplie tous les champs!</p>`
    }
})