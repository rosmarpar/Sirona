function iscorrect() {
    var reference = document.getElementById("product_reference").value;
    var price = document.getElementById("product_price").value;
    var quantity = document.getElementById("product_quantity").value;

    isPrice(price);

    if (isNaN(reference)|| isNaN(quantity)) {
        
        alert("La referencia y la cantidad deben ser numéricos");
        //poner todos los campos vacios
        document.getElementById("product_reference").value = "";
        document.getElementById("product_quantity").value = "";

        window.location.reload();
    }
}

function isPrice(price) {
    //si el precio es un numero y tiene un punto decimal es correcto
    if (isNaN(price) || price.indexOf(".") == -1) {
        alert("El precio debe ser un número con punto decimal");
        //poner todos los campos vacios
        document.getElementById("product_price").value = "";
        window.location.reload();
    }
    return true   
}

function isSalary(salary) {
  
    if (isNaN(salary) || salary.indexOf(".") == -1) {
        alert("El salario debe ser un número con punto decimal");
        document.getElementById("payroll_salary").value = "";
        window.location.reload();
    }
    return true   
}
function isDateCorrect() {

    var date = document.getElementById("payroll_date").value;   
    var salary = document.getElementById("payroll_salary").value;
    var today = new Date();
    let output =today.getFullYear() + '-' + String(today.getMonth() + 1).padStart(2, '0') + '-' + String(today.getDate()).padStart(2, '0')
  
    isSalary(salary);

    if (date > output) {
        alert("La fecha no puede ser mayor a la actual");
        //poner todos los campos vacios
        document.getElementById("payroll_date").value = "";
        window.location.reload();
    }
    return true  
}