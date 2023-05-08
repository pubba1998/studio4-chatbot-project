
function addCart(values) {
    var action = 'cartAction.php'
    var id = Math.random();
    document.write('<form id="post' + id + '" name="post' + id + '" action="' + action + '" method="post">');
    for (var key in values) {
        document.write('<input type="hidden" name="' + key + '" value="' + values[key] + '" />');
    }
    document.write('</form>');
    document.getElementById('post' + id).submit();
}
var fishFoods = [
    {name: "Chi Fish Food", price: 5},
    {name: "Diomands", price: 20},
    {name: "Tera Bits", price: 20},
    {name: "Goald Fish", price: 15}    
];  

var dogFoods = [
    {name: "Bakers", price: 30},
    {name: "Adult Dog", price: 20},
    {name: "Wilderness", price: 20},
    {name: "Baby Blue", price: 25}
];  

var catFoods = [
    {name: "Whiskas", price: 30},
    {name: "Drools", price: 20},
    {name: "Meow Mix", price: 20},
    {name: "One", price: 25}
];  

var birdFoods = [
    {name: "Wild Bird", price: 18},
    {name: "Bonanza", price: 15},
    {name: "Peckish", price: 15},
    {name: "Mazuri", price: 10}
];
