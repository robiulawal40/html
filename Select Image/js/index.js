let allImage = document.querySelectorAll(".selectable_image img");
let inputElement = document.querySelector('.image_selector');
let imgDiv = document.querySelector('.selectable_image');
let imgDisplay = document.querySelector('.display_image');

imgDiv.style.display = "none";
inputElement.addEventListener( "focus", function(){
  imgDiv.style.display = "block";
  imgDiv.style.border = "1px solid #333";
   let selectedImage = document.querySelector('.image_selector').value;
   document.querySelector('.selectable_image img[design="'+selectedImage+'"]').style.border="3px solid #444";
} );

allImage.forEach(function(ele){
  ele.addEventListener( 'click', function(){
    let selectedImage = document.querySelector('.image_selector').value;
    document.querySelector('.selectable_image img[design="'+selectedImage+'"]').style.border="3px solid transparent";
   inputElement.value=ele.getAttribute("design");
   imgDiv.style.display = "none";
  imgDisplay.setAttribute("src", ele.getAttribute("src"));
  } );
});
