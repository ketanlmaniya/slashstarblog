(function ($) {
"use strict";
  $(document).ready(function() {

    $('.customize-control-layout label img').on( 'click', function() {
      $(this).prev().prop('checked');
      $(this).closest('.customize-control-layout').find('label').removeClass('selected');
      $(this).closest('label').addClass('selected');
    });

    // Input layout
    $('.customize-control-layout input:radio').change( function () {
      $ (this).parent();
      var setting = $(this).data('id');
      var image = $(this).val();
      wp.customize(setting, function (obj) {
        obj.set( image );
      });
    });

    // CheckBox Input
    $( '.customize-control-boxcheck input' ).change( function () {
      var setting = $(this).data('id');
      var checkbox = $(this).val();
      wp.customize(setting, function (obj) {
        obj.set(checkbox);
      });
    });

    // Checkbox toggle
    $( '.customize-control-toggle-checkbox input[type="checkbox"]' ).each( function() {
      if ($(this).is(':checked')) {
        $(this).parent().addClass('checked');
      }

      $(this).on( 'click', function() {
        if ($(this).is(':checked')) {
          $(this).parent().addClass('checked');
        } else {
          $(this).parent().removeClass('checked');
        }
      });
    });

    // Slider
    var controlSlider = $('.customize-control-slider');
    controlSlider.each( function() {
      var inputField = $(this).find('.custom-slider-range-input'),
          sliderRange = $(this).find('.custom-slider-range');

      $(this).find('.custom-slider-range').slider({
        range: "min",
        min: sliderRange.data('min'),
        max: sliderRange.data('max'),
        step: sliderRange.data('step'),
        value: inputField.val(),
        animate: true,
        slide: function( event, ui ) {
          $(this).next().val( ui.value );
          inputField.trigger('change');
        }
      });
    } )

    $('.custom-slider-range-input').on('keyup paste', function() {
        $(this).change();
        var sliderRange = $(this).prev();
        $(this).prev().slider({
          range: "min",
          min: sliderRange.data('min'),
          max: sliderRange.data('max'),
          value: $(this).val(),
          animate: true,
        });
    } );

    $( '.custom-slider-range-input' ).on( 'change', function() {
      $ ( this ).parent();
      var setting = $ ( this ).data( 'id' );
      var range = $ ( this ).val();
      wp.customize(setting, function ( obj ) {obj.set( range );} );
    });
  });

})(jQuery);


