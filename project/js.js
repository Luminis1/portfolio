Element.prototype.append = function(el){
    var newElement = document.createElement(el);
    this.appendChild(newElement);
    return newElement;
}

Element.prototype.appendText = function(el){
    var newElement = document.createTextNode(el);
    this.appendChild(newElement);
}
Element.prototype.remove = function(){
    this.parentElement.removeChild(this);
}
var btn = document.getElementById('btn');
btn.onclick = function(){
    var prod = document.getElementById('newproduct').value;
    var list = document.getElementById('list');
    var newp = list.append("li");
    var ch = newp.append('input');
    var s = newp.append("span");
    var s1 = newp.append("span");
    s1.appendText(" x");
    s1.onclick = function(){
        this.parentElement.remove();
    }
    ch.setAttribute("type", "checkbox");
    s.appendText(prod);
    
}
