$('.owl-carousel').owlCarousel({
  loop:true,
  margin:10,
  responsiveClass:true,
  autoplayHoverPause: false,
  autoplay: true,
  smartSpeed: 1000,
  nav:false,
  items:1,
  lazyLoad: true,
  lazyLoadEager:1
})

$('.testimonial_slider').owlCarousel({
  loop:true,
  margin:0,
  nav:false,
  mouseDrag: false,
  items:1,
  dots: false,
  autoHeight: true,
  autoplay: true,
  smartSpeed:1500,
  autoplayHoverPause: true,
  animateOut: "slideOutDown",
  animateIn: "slideInDown",
});

$(window).scroll(function() {
  if ($(".navbar").offset().top > 1) {
    $(".fixed-top").addClass("bg-dark");
    $(".fixed-top").removeClass("bg-light");
    $(".fixed-top").addClass("scrollbar");
      } else {
        $(".fixed-top").removeClass("bg-light");
        $(".fixed-top").removeClass("scrollbar");
      }
});


// menu icon
$(document).ready(function(){
  $('.navbar-toggler').click(function(){
    $('.navbar-toggler').toggleClass('active');
  });
});

$('.menu_product').owlCarousel({
  loop:true,
  margin:0,
  nav:false,
  mouseDrag: false,
  items:1,
  dots: false,
  autoHeight: true,
  autoplay: true,
  smartSpeed:1500,
  autoplayHoverPause: true,
  animateOut: "slideOutDown",
  animateIn: "slideInDown",
});


// inc dec

const decreaseNumber = (incdec) => {
  var itemval = document.getElementById(incdec);
  if(itemval.value <= 1){
    itemval.value = 1;
    alert('minimum 1');
  }else{
    itemval.value = parseInt(itemval.value ) -1;
    
    itemval.style.background = '#000';
    itemval.style.color = '#fff';
  }
}

const IncreseNumber = (incdec) => {
  var itemval = document.getElementById(incdec);

  if(itemval.value >= 5) {

    itemval.value = 5;
    alert('max 5');
    itemval.style.background = 'red';
    itemval.style.color = '#fff';
  }else{
    itemval.value = parseInt(itemval.value) + 1;
  }
}

// table


$(document).ready(function() {
  var table = $('.mytable').DataTable( {
      rowReorder: {
          selector: 'td:nth-child(2)'
      },
      responsive: true,
      "aoColumnDefs": [{
        'bSortable':false,
        'aTargets':['nosort'],
      }],
      columnDefs:[
        {type:'data-dd-mm-yyyy',aTargets:[2]}
      ],
      "aoColumns":[
        null,
        null,
        null,
        null,
        null,
      ],
      "order": false,
      "bLengthChange":false,
      
  } );
} );

// check username availability

$(document).ready(function(){
  $('#username').blur(function(){
    var username = $ (this).val();
    $.ajax({
      url: 'checkuser.php',
      method: "POST",
      data: {user_name: username},
      success: function(data){
        if(data != '0')
        {
          $('#usermsg').html('<span class="text-danger mb-3">Username Not available</span>');
          // $(":submit").attr("disabled", true);
        }
        else
        {
          $('#usermsg').html('<span class="text-success mb-3">Username available</span>');
          // $(":submit").attr("disabled", false);
        }
      }
    })
  })
});

// check email

$(document).ready(function(){
  $('#email').blur(function(){
    var email = $ (this).val();
    $.ajax({
      url: 'checkuser.php',
      method: "POST",
      data: {
        user_email: email
      },
      success: function(data){
        if(data != '0')
        {
          $('#Eusermsg').html('<span class="text-danger mb-3">email Not available</span>');
          // $('#submit').attr("disabled", true);
        }
        else
        {
          $('#Eusermsg').html('<span class="text-success mb-3">email available</span>');
          // $('#submit').attr("disabled", false);
        }
      }
    })
  })
});

// confirm password


// show upi 

$(document).ready(function () {
  
//  upi
  $('#paymode').change(function()
  {
    var title = $(this).val();
    if(title == "cash")
    {
      $('#orderbtn').show();
    }
  });

  $('#paymode').change(function()
  {
    var title = $(this).val();
    if(title == "Upi")
    {
      $('#upiscan').modal('show');
      $('#orderbtn').show();
    }
  });

  // card
  
  $('#paymode').change(function()
  {
    var title = $(this).val();
    if(title == "Card")
    {
      $('#cardscan').modal('show');
      // disable button
      $('#orderbtn').hide();
    }
  });

});

// get process patment 

$(document).ready(function () {
  
  var totl = $('#totalcart').html();
 $('#carttotl').html(totl); 

  $("#cardcnforder").click(function(e) {
    // e.preventDefault();
    $("[name='cnforder']")[0].click();
  });

});

//  aitu just card empty hole pay button tu disable 
// check if empty card

$(document).ready(function(){
  $('#cardholder, #cardnumber, #cmonth, #cyear, #cvv').bind('keyup', function() {
    if(allFilled()) {
      $('#cardcnforder').removeAttr('disabled');
    }
    else{
      $('#cardcnforder').attr("disabled", 'disabled');
    }
});

function allFilled() {
    var filled = true;
    $('#credit-card input').each(function() {
        if($(this).val() == '') filled = false;
    });
    return filled;
}
});