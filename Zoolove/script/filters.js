$('document').ready(()=>{
  $('#filters select').each((index,element)=>{
    const value = sessionStorage.getItem(element.name);
    element.value = value;
  })
})

$('#filters select').on('change',(evt)=>{
  sessionStorage.setItem(evt.currentTarget.name,evt.currentTarget.value);
})