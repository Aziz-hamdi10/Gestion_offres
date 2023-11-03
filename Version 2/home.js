


function myfn() {
  let boxes=[...document.querySelectorAll('.packages .box-container .box')];
  for( var i =0;i<3;i++)
  {
    boxes[i].style.display='inline-block';
  }
}

const x=document.getElementsByClassName('wrap');
function close1(){
    x[0].className='wrap';
}
function active(){
    x[0].className='wrap active';
}
function diactive1(){x[0].className='wrap active-btn';

}
function btnlogin(){
    x[0].className='wrap active-btn';
}
function regis2(){
    x[0].className='wrap t1';
}
var swiper = new Swiper(".home-slider", {
    loop:true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
    

