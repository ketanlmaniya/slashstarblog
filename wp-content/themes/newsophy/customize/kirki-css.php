<?php
add_action( 'customize_controls_print_styles', function() {
  ?>
  <style>
  .customize-control-heading {
    margin-bottom: 10px;
    border-bottom: 1px solid #2c40ff;
    text-transform: uppercase;
   } 
  .customize-control-heading input {
    display: none;
  }
  .kirki-toggle-switch-label::before {
    background-color: #fff;
    border: 1px solid #fff;
    border-radius: 18px;
    height: 24px;
    width: 37px;
  }
  .kirki-toggle-switch-label:after {
    background-color: #999;
    border: 1px solid rgba(0,0,0,.1);
    height: 18px;
    width: 18px;
  }
  .kirki-toggle-switch-input:checked + .kirki-toggle-switch-label::after {
    background-color: #3f4649;
  }
  .customize-control-kirki-slider .kirki-control-slider {
    height: 1px;
  }
  .kirki-trigger-circle-wrapper {
    background-color: #fff;
  }
  .customize-control-kirki-react-colorful .kirki-trigger-circle-wrapper,
  .customize-control-kirki-react-colorful .kirki-trigger-circle,
  .customize-control-kirki-react-colorful .kirki-color-preview {
    border-radius: 2px;
  }
  .customize-control-kirki-react-colorful .kirki-trigger-circle-wrapper {
    width: 35px;
    height: 29px;
    border: 0;
    border-radius: 2px;
    justify-content: center;
    align-items: center;
    padding: 0;
    display: flex;
    position: relative;
    top: -3px;
}
  .customize-control-kirki-react-colorful .kirki-trigger-circle {
    width: 33px;
  }
  .image label {
    width: 32%;
    margin-right: 2%;
  }
  .image label:last-child {
    margin-right: 0;
  }
  </style>
  <?php
} );

?>