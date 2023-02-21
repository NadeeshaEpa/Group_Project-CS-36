function pay(agentid){
    var x=new XMLHttpRequest();
    x.onreadystatechange=function(){
        if(x.readyState==4){
            var text=x.responseText;

            if(text=="failed"){
                alert("Qunatity not enough to provide service");
            }else{
                alert("Payment Successfull");
                // window.location.href="http://localhost:8001/customer/payment.php";
            }
        }
    }
    x.open("GET","http://localhost:8001/controller/customer/payment_controller.php?id"+agentid,true);
    x.send();
}