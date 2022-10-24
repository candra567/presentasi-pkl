const btnCopy=document.querySelector('#btn-copy')
const urlText=document.querySelector('.url-text')
btnCopy.addEventListener('click',function(){
    navigator.clipboard.writeText(urlText.innerHTML).then(()=>{
    urlText.style.borderBottom="1px solid black";
    setTimeout(() => {
        urlText.style.borderBottom="none";
    }, 3000);
    })
})

// detail
const btnDetail=document.querySelectorAll('.btn-detail');
const modalDetail=document.querySelector('.modal-detail');
for (const btn of btnDetail){

    btn.addEventListener('click',function(){
        let idMessage=this.getAttribute('dataid');
        let html="";
        fetch('/message/'+idMessage)
        .then((response=>response.json()))
        .then(data =>{
            for(const item of data.data){
               html+=`
               <h5 class="text-center my-3 ">Detail Pesan</h5>
               <p class="alert alert-success">${item.created_at}</p>
               <div class="alert alert-primary">
               <em class="mb-5">
               <p class="my-2">Pesan Masuk</p>
               ${item.content_message}
               </em>
               </div>
               `
            }
            modalDetail.innerHTML=html;
        })
    })
}
