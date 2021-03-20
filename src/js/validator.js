//login
document.getElementById('modalAddRegister').addEventListener("click", (e)=>{  
    e.preventDefault();
    //Verification du login
    addUser();
    if ($('#modalAddUser').valid()){ 
        document.getElementById('modalAddUser').submit();
    };   
});

