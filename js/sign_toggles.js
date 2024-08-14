
const container = document.getElementById('container');
const registrationBtn = document.getElementById('register');
const logginBtn = document.getElementById('login');

registrationBtn.addEventListener('click', ()=> 
{
    container.classList.add("active");
});


logginBtn.addEventListener('click', ()=> 
{
    container.classList.remove("active");
});