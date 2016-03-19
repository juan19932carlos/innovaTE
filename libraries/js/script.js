var Validar = function() {
}
Validar.isEmpty = function(e) {
    if ((e == "") || (e == null) || (e == undefined))
        return true;
    return false;
}