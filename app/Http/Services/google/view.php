<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Google Drive Upload</title>
    <!-- Styles -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
   
    <style type="text/css">
        
.btn {
  border-radius: 3px;
  outline: none !important;
}
.btn-md {
  padding: 8px 16px;
}
.btn-primary,
.btn-success,
.btn-default,
.btn-info,
.btn-warning,
.btn-danger,
.btn-inverse,
.btn-purple,
.btn-pink {
  color: #ffffff !important;
}
.btn-default,
.btn-default:hover,
.btn-default:focus,
.btn-default:active,
.btn-default.active,
.btn-default.focus,
.btn-default:active,
.btn-default:focus,
.btn-default:hover,
.open > .dropdown-toggle.btn-default {
  background-color: #5fbeaa !important;
  border: 1px solid #5fbeaa !important;
}
.btn-white,
.btn-white:hover,
.btn-white:focus,
.btn-white:active,
.btn-white.active,
.btn-white.focus,
.btn-white:active,
.btn-white:focus,
.btn-white:hover,
.open > .dropdown-toggle.btn-white {
  border: 1px solid #eaeaea !important;
  background-color: #ffffff;
  color: #4c5667;
}
.btn-white:hover,
.btn-white:hover:hover,
.btn-white:focus:hover,
.btn-white:active:hover,
.btn-white.active:hover,
.btn-white.focus:hover,
.btn-white:active:hover,
.btn-white:focus:hover,
.btn-white:hover:hover,
.open > .dropdown-toggle.btn-white:hover {
  background-color: #f9f9f9;
}
.btn-white:focus,
.btn-white:hover:focus,
.btn-white:focus:focus,
.btn-white:active:focus,
.btn-white.active:focus,
.btn-white.focus:focus,
.btn-white:active:focus,
.btn-white:focus:focus,
.btn-white:hover:focus,
.open > .dropdown-toggle.btn-white:focus {
  background-color: #f9f9f9;
}
.btn-white:active,
.btn-white:hover:active,
.btn-white:focus:active,
.btn-white:active:active,
.btn-white.active:active,
.btn-white.focus:active,
.btn-white:active:active,
.btn-white:focus:active,
.btn-white:hover:active,
.open > .dropdown-toggle.btn-white:active {
  background-color: #f9f9f9;
}
.btn-primary,
.btn-primary:hover,
.btn-primary:focus,
.btn-primary:active,
.btn-primary.active,
.btn-primary.focus,
.btn-primary:active,
.btn-primary:focus,
.btn-primary:hover,
.open > .dropdown-toggle.btn-primary {
  background-color: #5d9cec !important;
  border: 1px solid #5d9cec !important;
}
.btn-success,
.btn-success:hover,
.btn-success:focus,
.btn-success:active,
.btn-success.active,
.btn-success.focus,
.btn-success:active,
.btn-success:focus,
.btn-success:hover,
.open > .dropdown-toggle.btn-success {
  background-color: #81c868 !important;
  border: 1px solid #81c868 !important;
}
.btn-info,
.btn-info:hover,
.btn-info:focus,
.btn-info:active,
.btn-info.active,
.btn-info.focus,
.btn-info:active,
.btn-info:focus,
.btn-info:hover,
.open > .dropdown-toggle.btn-info {
  background-color: #34d3eb !important;
  border: 1px solid #34d3eb !important;
}
.btn-warning,
.btn-warning:hover,
.btn-warning:focus,
.btn-warning:active,
.btn-warning.active,
.btn-warning.focus,
.btn-warning:active,
.btn-warning:focus,
.btn-warning:hover,
.open > .dropdown-toggle.btn-warning {
  background-color: #ffbd4a !important;
  border: 1px solid #ffbd4a !important;
}
.btn-danger,
.btn-danger:active,
.btn-danger:focus,
.btn-danger:hover,
.btn-danger.active,
.btn-danger.focus,
.btn-danger:active,
.btn-danger:focus,
.btn-danger:hover,
.open > .dropdown-toggle.btn-danger {
  background-color: #f05050 !important;
  border: 1px solid #f05050 !important;
}
.btn-inverse,
.btn-inverse:hover,
.btn-inverse:focus,
.btn-inverse:active,
.btn-inverse.active,
.btn-inverse.focus,
.btn-inverse:active,
.btn-inverse:focus,
.btn-inverse:hover,
.open > .dropdown-toggle.btn-inverse {
  background-color: #4c5667 !important;
  border: 1px solid #4c5667 !important;
  color: #ffffff;
}
.btn-purple,
.btn-purple:hover,
.btn-purple:focus,
.btn-purple:active {
  background-color: #7266ba !important;
  border: 1px solid #7266ba !important;
  color: #ffffff;
}
.btn-pink,
.btn-pink:hover,
.btn-pink:focus,
.btn-pink:active {
  background-color: #fb6d9d !important;
  border: 1px solid #fb6d9d !important;
  color: #ffffff;
}
.open > .dropdown-toggle.btn-primary.btn-custom,
.open > .dropdown-toggle.btn-success.btn-custom,
.open > .dropdown-toggle.btn-info.btn-custom,
.open > .dropdown-toggle.btn-warning.btn-custom,
.open > .dropdown-toggle.btn-danger.btn-custom,
.open > .dropdown-toggle.btn-default.btn-custom {
  border-width: 2px !important;
  color: #ffffff !important;
}
.open > .dropdown-toggle.btn-white.btn-custom {
  border-width: 2px !important;
}
.btn-custom.btn-default {
  color: #5fbeaa !important;
}
.btn-custom.btn-primary {
  color: #5d9cec !important;
}
.btn-custom.btn-success {
  color: #81c868 !important;
}
.btn-custom.btn-info {
  color: #34d3eb !important;
}
.btn-custom.btn-warning {
  color: #ffbd4a !important;
}
.btn-custom.btn-danger {
  color: #f05050 !important;
}
.btn-custom.btn-inverse {
  color: #4c5667 !important;
}
.btn-custom.btn-purple {
  color: #7266ba !important;
}
.btn-custom.btn-white {
  color: #4c5667 !important;
}
.btn-custom.btn-white:hover,
.btn-custom.btn-white:focus,
.btn-custom.btn-white:active {
  color: #4c5667 !important;
  background-color: #f4f8fb !important;
}
.btn-custom.btn-pink {
  color: #fb6d9d !important;
}
.btn-rounded {
  border-radius: 2em !important;
  padding: 6px 20px;
}
.btn-rounded .btn-label {
  padding: 7px 15px 7px 20px;
  margin-left: -20px;
}
.btn-rounded .btn-label-right {
  margin-right: -20px;
  margin-left: 12px;
}
.btn-custom {
  -moz-border-radius: 2px;
  -moz-transition: all 400ms ease-in-out;
  -o-transition: all 400ms ease-in-out;
  -webkit-border-radius: 2px;
  -webkit-transition: all 400ms ease-in-out;
  background: transparent;
  background-color: transparent !important;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  -moz-border-radius: 5px;
  background-clip: padding-box;
  border-width: 2px !important;
  font-weight: 600;
  transition: all 400ms ease-in-out;
  background-clip: inherit;
}
.btn-custom:hover {
  color: #ffffff !important;
  border-width: 2px !important;
}
.btn-custom:focus {
  color: #ffffff !important;
  border-width: 2px !important;
}
.btn-label {
  background: rgba(0, 0, 0, 0.05);
  display: inline-block;
  padding: 7px 15px;
  border-radius: 3px 0 0 3px;
  margin: -7px -13px;
  margin-right: 12px;
}
.btn-label-right {
  margin-left: 12px;
  margin-right: -13px;
  border-radius: 0px 3px 3px 0px;
}
.btn-group.open .dropdown-toggle {
  box-shadow: none;
}
/* File Upload */
.fileupload {
  overflow: hidden;
  position: relative;
}
.fileupload input.upload {
  cursor: pointer;
  filter: alpha(opacity=0);
  font-size: 20px;
  margin: 0;
  opacity: 0;
  padding: 0;
  position: absolute;
  right: 0;
  top: 0;
}
/* Social Buttons */
.btn-facebook {
  color: #ffffff !important;
  background-color: #3b5998 !important;
}
.btn-twitter {
  color: #ffffff !important;
  background-color: #00aced !important;
}
.btn-linkedin {
  color: #ffffff !important;
  background-color: #007bb6 !important;
}
.btn-dribbble {
  color: #ffffff !important;
  background-color: #ea4c89 !important;
}
.btn-googleplus {
  color: #ffffff !important;
  background-color: #dd4b39 !important;
}
.btn-instagram {
  color: #ffffff !important;
  background-color: #517fa4 !important;
}
.btn-pinterest {
  color: #ffffff !important;
  background-color: #cb2027 !important;
}
.btn-dropbox {
  color: #ffffff !important;
  background-color: #007ee5 !important;
}
.btn-flickr {
  color: #ffffff !important;
  background-color: #ff0084 !important;
}
.btn-tumblr {
  color: #ffffff !important;
  background-color: #32506d !important;
}
.btn-skype {
  color: #ffffff !important;
  background-color: #00aff0 !important;
}
.btn-youtube {
  color: #ffffff !important;
  background-color: #bb0000 !important;
}
.btn-github {
  color: #ffffff !important;
  background-color: #171515 !important;
}
/* =============
   Checkbox and Radios
============= */
.checkbox {
  padding-left: 20px;
}
.checkbox label {
  display: inline-block;
  padding-left: 5px;
  position: relative;
}
.checkbox label::before {
  -o-transition: 0.3s ease-in-out;
  -webkit-transition: 0.3s ease-in-out;
  background-color: #ffffff;
  border-radius: 3px;
  border: 1px solid #cccccc;
  content: "";
  display: inline-block;
  height: 17px;
  left: 0;
  margin-left: -20px;
  position: absolute;
  transition: 0.3s ease-in-out;
  width: 17px;
  outline: none !important;
}
.checkbox label::after {
  color: #555555;
  display: inline-block;
  font-size: 11px;
  height: 16px;
  left: 0;
  margin-left: -20px;
  padding-left: 3px;
  padding-top: 1px;
  position: absolute;
  top: 0;
  width: 16px;
}
.checkbox input[type="checkbox"] {
  cursor: pointer;
  opacity: 0;
  z-index: 1;
  outline: none !important;
}
.checkbox input[type="checkbox"]:disabled + label {
  opacity: 0.65;
}
.checkbox input[type="checkbox"]:focus + label::before {
  outline-offset: -2px;
  outline: none;
  outline: thin dotted;
}
.checkbox input[type="checkbox"]:checked + label::after {
  content: "\f00c";
  font-family: 'FontAwesome';
}
.checkbox input[type="checkbox"]:disabled + label::before {
  background-color: #eeeeee;
  cursor: not-allowed;
}
.checkbox.checkbox-circle label::before {
  border-radius: 50%;
}
.checkbox.checkbox-inline {
  margin-top: 0;
}
.checkbox.checkbox-single label {
  height: 17px;
}
.checkbox-custom input[type="checkbox"]:checked + label::before {
  background-color: #5fbeaa;
  border-color: #5fbeaa;
}
.checkbox-custom input[type="checkbox"]:checked + label::after {
  color: #ffffff;
}
.checkbox-primary input[type="checkbox"]:checked + label::before {
  background-color: #5d9cec;
  border-color: #5d9cec;
}
.checkbox-primary input[type="checkbox"]:checked + label::after {
  color: #ffffff;
}
.checkbox-danger input[type="checkbox"]:checked + label::before {
  background-color: #f05050;
  border-color: #f05050;
}
.checkbox-danger input[type="checkbox"]:checked + label::after {
  color: #ffffff;
}
.checkbox-info input[type="checkbox"]:checked + label::before {
  background-color: #34d3eb;
  border-color: #34d3eb;
}
.checkbox-info input[type="checkbox"]:checked + label::after {
  color: #ffffff;
}
.checkbox-warning input[type="checkbox"]:checked + label::before {
  background-color: #ffbd4a;
  border-color: #ffbd4a;
}
.checkbox-warning input[type="checkbox"]:checked + label::after {
  color: #ffffff;
}
.checkbox-success input[type="checkbox"]:checked + label::before {
  background-color: #81c868;
  border-color: #81c868;
}
.checkbox-success input[type="checkbox"]:checked + label::after {
  color: #ffffff;
}
.checkbox-purple input[type="checkbox"]:checked + label::before {
  background-color: #7266ba;
  border-color: #7266ba;
}
.checkbox-purple input[type="checkbox"]:checked + label::after {
  color: #ffffff;
}
.checkbox-pink input[type="checkbox"]:checked + label::before {
  background-color: #fb6d9d;
  border-color: #fb6d9d;
}
.checkbox-pink input[type="checkbox"]:checked + label::after {
  color: #ffffff;
}
.checkbox-inverse input[type="checkbox"]:checked + label::before {
  background-color: #4c5667;
  border-color: #4c5667;
}
.checkbox-inverse input[type="checkbox"]:checked + label::after {
  color: #ffffff;
}
/* Radios */
.radio {
  padding-left: 20px;
}
.radio label {
  display: inline-block;
  padding-left: 5px;
  position: relative;
}
.radio label::before {
  -o-transition: border 0.5s ease-in-out;
  -webkit-transition: border 0.5s ease-in-out;
  background-color: #ffffff;
  border-radius: 50%;
  border: 1px solid #cccccc;
  content: "";
  display: inline-block;
  height: 17px;
  left: 0;
  margin-left: -20px;
  position: absolute;
  transition: border 0.5s ease-in-out;
  width: 17px;
  outline: none !important;
}
.radio label::after {
  -moz-transition: -moz-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
  -ms-transform: scale(0, 0);
  -o-transform: scale(0, 0);
  -o-transition: -o-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
  -webkit-transform: scale(0, 0);
  -webkit-transition: -webkit-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
  background-color: #555555;
  border-radius: 50%;
  content: " ";
  display: inline-block;
  height: 11px;
  left: 3px;
  margin-left: -20px;
  position: absolute;
  top: 3px;
  transform: scale(0, 0);
  transition: transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
  width: 11px;
}
.radio input[type="radio"] {
  cursor: pointer;
  opacity: 0;
  z-index: 1;
  outline: none !important;
}
.radio input[type="radio"]:disabled + label {
  opacity: 0.65;
}
.radio input[type="radio"]:focus + label::before {
  outline-offset: -2px;
  outline: 5px auto -webkit-focus-ring-color;
  outline: thin dotted;
}
.radio input[type="radio"]:checked + label::after {
  -ms-transform: scale(1, 1);
  -o-transform: scale(1, 1);
  -webkit-transform: scale(1, 1);
  transform: scale(1, 1);
}
.radio input[type="radio"]:disabled + label::before {
  cursor: not-allowed;
}
.radio.radio-inline {
  margin-top: 0;
}
.radio.radio-single label {
  height: 17px;
}
.radio-custom input[type="radio"] + label::after {
  background-color: #5fbeaa;
}
.radio-custom input[type="radio"]:checked + label::before {
  border-color: #5fbeaa;
}
.radio-custom input[type="radio"]:checked + label::after {
  background-color: #5fbeaa;
}
.radio-primary input[type="radio"] + label::after {
  background-color: #5d9cec;
}
.radio-primary input[type="radio"]:checked + label::before {
  border-color: #5d9cec;
}
.radio-primary input[type="radio"]:checked + label::after {
  background-color: #5d9cec;
}
.radio-danger input[type="radio"] + label::after {
  background-color: #f05050;
}
.radio-danger input[type="radio"]:checked + label::before {
  border-color: #f05050;
}
.radio-danger input[type="radio"]:checked + label::after {
  background-color: #f05050;
}
.radio-info input[type="radio"] + label::after {
  background-color: #34d3eb;
}
.radio-info input[type="radio"]:checked + label::before {
  border-color: #34d3eb;
}
.radio-info input[type="radio"]:checked + label::after {
  background-color: #34d3eb;
}
.radio-warning input[type="radio"] + label::after {
  background-color: #ffbd4a;
}
.radio-warning input[type="radio"]:checked + label::before {
  border-color: #ffbd4a;
}
.radio-warning input[type="radio"]:checked + label::after {
  background-color: #ffbd4a;
}
.radio-success input[type="radio"] + label::after {
  background-color: #81c868;
}
.radio-success input[type="radio"]:checked + label::before {
  border-color: #81c868;
}
.radio-success input[type="radio"]:checked + label::after {
  background-color: #81c868;
}
.radio-purple input[type="radio"] + label::after {
  background-color: #7266ba;
}
.radio-purple input[type="radio"]:checked + label::before {
  border-color: #7266ba;
}
.radio-purple input[type="radio"]:checked + label::after {
  background-color: #7266ba;
}
.radio-pink input[type="radio"] + label::after {
  background-color: #fb6d9d;
}
.radio-pink input[type="radio"]:checked + label::before {
  border-color: #fb6d9d;
}
.radio-pink input[type="radio"]:checked + label::after {
  background-color: #fb6d9d;
}
/* =============
   Panels
============= */
.panel {
  border: none;
  margin-bottom: 20px;
}
.panel .panel-body {
  padding: 20px;
}
.panel .panel-body p {
  margin: 0px;
}
.panel .panel-body p + p {
  margin-top: 15px;
}
.panel-heading {
  border: none !important;
  padding: 10px 20px;
}
.panel-default > .panel-heading {
  background-color: #f4f8fb;
  border-bottom: none;
  color: #797979;
}
.panel-title {
  font-size: 15px;
  font-weight: 600;
  margin-bottom: 0;
  margin-top: 0;
  text-transform: uppercase;
  letter-spacing: 0.03em;
}
.panel-footer {
  background: #f4f8fb;
  border-top: 0px;
}
.panel-color .panel-title {
  color: #ffffff;
}
.panel-custom > .panel-heading {
  background-color: #5fbeaa;
}
.panel-primary > .panel-heading {
  background-color: #5d9cec;
}
.panel-success > .panel-heading {
  background-color: #81c868;
}
.panel-info > .panel-heading {
  background-color: #34d3eb;
}
.panel-warning > .panel-heading {
  background-color: #ffbd4a;
}
.panel-danger > .panel-heading {
  background-color: #f05050;
}
.panel-purple > .panel-heading {
  background-color: #7266ba;
}
.panel-pink > .panel-heading {
  background-color: #fb6d9d;
}
.panel-inverse > .panel-heading {
  background-color: #4c5667;
}
.panel-border .panel-heading {
  background-color: #ffffff;
  border-top: 3px solid #DADFE2 !important;
  padding: 10px 20px 0px;
}
.panel-border .panel-body {
  padding: 15px 20px 20px 20px;
}
.panel-border.panel-custom .panel-heading {
  border-color: #5fbeaa !important;
  color: #5fbeaa !important;
}
.panel-border.panel-primary .panel-heading {
  border-color: #5d9cec !important;
  color: #5d9cec !important;
}
.panel-border.panel-success .panel-heading {
  border-color: #81c868 !important;
  color: #81c868 !important;
}
.panel-border.panel-info .panel-heading {
  border-color: #34d3eb !important;
  color: #34d3eb !important;
}
.panel-border.panel-warning .panel-heading {
  border-color: #ffbd4a !important;
  color: #ffbd4a !important;
}
.panel-border.panel-danger .panel-heading {
  border-color: #f05050 !important;
  color: #f05050 !important;
}
.panel-border.panel-purple .panel-heading {
  border-color: #7266ba !important;
  color: #7266ba !important;
}
.panel-border.panel-pink .panel-heading {
  border-color: #fb6d9d !important;
  color: #fb6d9d !important;
}
.panel-border.panel-inverse .panel-heading {
  border-color: #4c5667 !important;
  color: #4c5667 !important;
}
.panel-group .panel .panel-heading a[data-toggle=collapse].collapsed:before {
  content: '\f0d7';
}
.panel-group .panel .panel-heading .accordion-toggle.collapsed:before {
  content: '\f0d7';
}
.panel-group .panel .panel-heading a[data-toggle=collapse] {
  display: block;
}
.panel-group .panel .panel-heading a[data-toggle=collapse]:before {
  content: '\f0d8';
  display: block;
  float: right;
  font-family: 'FontAwesome';
  font-size: 14px;
  text-align: right;
  width: 25px;
}
.panel-group .panel .panel-heading .accordion-toggle {
  display: block;
}
.panel-group .panel .panel-heading .accordion-toggle:before {
  content: '\f0d8';
  display: block;
  float: right;
  font-family: 'FontAwesome';
  font-size: 14px;
  text-align: right;
  width: 25px;
}
.panel-group .panel .panel-heading + .panel-collapse .panel-body {
  border-top: none;
}
.panel-group .panel-heading {
  padding: 12px 26px;
}
.panel-group.panel-group-joined .panel + .panel {
  border-top: 1px solid #eeeeee;
  margin-top: 0;
}
.panel-group-joined .panel-group .panel + .panel {
  border-top: 1px solid #eeeeee;
  margin-top: 0;
}
.panel .nav-pills li a {
  color: #4c5667 !important;
}
.panel .nav-pills li.active a {
  color: #ffffff !important;
}
/* =============
   Portlets
============= */
.portlet {
  background: #ffffff;
  border: 1px solid rgba(54, 64, 74, 0.05);
  -webkit-border-radius: 5px;
  border-radius: 5px;
  -moz-border-radius: 5px;
  background-clip: padding-box;
  margin-bottom: 20px;
}
.portlet .portlet-heading {
  -webkit-border-radius: 3px 3px 0px 0px;
  border-radius: 3px 3px 0px 0px;
  -moz-border-radius: 3px 3px 0px 0px;
  background-clip: padding-box;
  color: #ffffff;
  padding: 12px 20px;
}
.portlet .portlet-heading .portlet-title {
  color: #ffffff;
  float: left;
  font-size: 15px;
  font-weight: 600;
  margin-bottom: 0;
  margin-top: 0;
  text-transform: uppercase;
  letter-spacing: 0.03em;
}
.portlet .portlet-heading .portlet-widgets {
  display: inline-block;
  float: right;
  font-size: 15px;
  line-height: 30px;
  padding-left: 15px;
  position: relative;
  text-align: right;
}
.portlet .portlet-heading .portlet-widgets .divider {
  margin: 0 5px;
}
.portlet .portlet-heading .portlet-widgets .collapsed .ion-minus-round:before {
  content: "\f217" !important;
}
.portlet .portlet-heading a {
  color: #999999;
}
.portlet .portlet-body {
  -moz-border-radius-bottomleft: 5px;
  -moz-border-radius-bottomright: 5px;
  -webkit-border-bottom-left-radius: 5px;
  -webkit-border-bottom-right-radius: 5px;
  background: #ffffff;
  border-bottom-left-radius: 5px;
  border-bottom-right-radius: 5px;
  padding: 15px;
}
.portlet-default .portlet-title {
  color: #797979 !important;
}
.portlet .portlet-heading.bg-custom a,
.portlet .portlet-heading.bg-purple a,
.portlet .portlet-heading.bg-info a,
.portlet .portlet-heading.bg-success a,
.portlet .portlet-heading.bg-primary a,
.portlet .portlet-heading.bg-danger a,
.portlet .portlet-heading.bg-warning a,
.portlet .portlet-heading.bg-inverse a,
.portlet .portlet-heading.bg-pink a {
  color: #ffffff;
}
.panel-disabled {
  background: rgba(243, 242, 241, 0.5);
  bottom: 15px;
  left: 0px;
  position: absolute;
  right: -5px;
  top: 0;
}
.loader-1 {
  -moz-animation: loaderAnimate 1000ms linear infinite;
  -o-animation: loaderAnimate 1000ms linear infinite;
  -webkit-animation: loaderAnimate 1000ms linear infinite;
  animation: loaderAnimate 1000ms linear infinite;
  clip: rect(0, 30px, 30px, 15px);
  height: 30px;
  left: 50%;
  margin-left: -15px;
  margin-top: -15px;
  position: absolute;
  top: 50%;
  width: 30px;
}
.loader-1:after {
  -moz-animation: loaderAnimate2 1000ms ease-in-out infinite;
  -o-animation: loaderAnimate2 1000ms ease-in-out infinite;
  -webkit-animation: loaderAnimate2 1000ms ease-in-out infinite;
  animation: loaderAnimate2 1000ms ease-in-out infinite;
  border-radius: 50%;
  clip: rect(0, 30px, 30px, 15px);
  content: '';
  height: 30px;
  position: absolute;
  width: 30px;
}
/* =============
   Progressbars
============= */
.progress {
  -webkit-box-shadow: none !important;
  background-color: #ebeff2;
  box-shadow: none !important;
  height: 10px;
  margin-bottom: 18px;
  overflow: hidden;
}
.progress-bar {
  box-shadow: none;
  font-size: 8px;
  font-weight: 600;
  line-height: 12px;
}
.progress.progress-sm {
  height: 5px !important;
}
.progress.progress-sm .progress-bar {
  font-size: 8px;
  line-height: 5px;
}
.progress.progress-md {
  height: 15px !important;
}
.progress.progress-md .progress-bar {
  font-size: 10.8px;
  line-height: 14.4px;
}
.progress.progress-lg {
  height: 20px !important;
}
.progress.progress-lg .progress-bar {
  font-size: 12px;
  line-height: 20px;
}
.progress-bar-primary {
  background-color: #5d9cec;
}
.progress-bar-success {
  background-color: #81c868;
}
.progress-bar-info {
  background-color: #34d3eb;
}
.progress-bar-warning {
  background-color: #ffbd4a;
}
.progress-bar-danger {
  background-color: #f05050;
}
.progress-bar-inverse {
  background-color: #4c5667;
}
.progress-bar-purple {
  background-color: #7266ba;
}
.progress-bar-pink {
  background-color: #fb6d9d;
}
.progress-bar-custom {
  background-color: #5fbeaa;
}
.progress-animated {
  -webkit-animation-duration: 5s;
  -webkit-animation-name: animationProgress;
  -webkit-transition: 5s all;
  animation-duration: 5s;
  animation-name: animationProgress;
  transition: 5s all;
}
/* Progressbar Vertical */
.progress-vertical {
  min-height: 250px;
  height: 250px;
  width: 10px;
  position: relative;
  display: inline-block;
  margin-bottom: 0;
  margin-right: 20px;
}
.progress-vertical .progress-bar {
  width: 100%;
}
.progress-vertical-bottom {
  min-height: 250px;
  height: 250px;
  position: relative;
  width: 10px;
  display: inline-block;
  margin-bottom: 0;
  margin-right: 20px;
}
.progress-vertical-bottom .progress-bar {
  width: 100%;
  position: absolute;
  bottom: 0;
}
.progress-vertical.progress-sm,
.progress-vertical-bottom.progress-sm {
  width: 5px !important;
}
.progress-vertical.progress-sm .progress-bar,
.progress-vertical-bottom.progress-sm .progress-bar {
  font-size: 8px;
  line-height: 5px;
}
.progress-vertical.progress-md,
.progress-vertical-bottom.progress-md {
  width: 15px !important;
}
.progress-vertical.progress-md .progress-bar,
.progress-vertical-bottom.progress-md .progress-bar {
  font-size: 10.8px;
  line-height: 14.4px;
}
.progress-vertical.progress-lg,
.progress-vertical-bottom.progress-lg {
  width: 20px !important;
}
.progress-vertical.progress-lg .progress-bar,
.progress-vertical-bottom.progress-lg .progress-bar {
  font-size: 12px;
  line-height: 20px;
}
/* =============
   Tables
============= */
.table {
  margin-bottom: 10px;
}
.table-striped > tbody > tr:nth-of-type(odd),
.table-hover > tbody > tr:hover,
.table > thead > tr > td.active,
.table > tbody > tr > td.active,
.table > tfoot > tr > td.active,
.table > thead > tr > th.active,
.table > tbody > tr > th.active,
.table > tfoot > tr > th.active,
.table > thead > tr.active > td,
.table > tbody > tr.active > td,
.table > tfoot > tr.active > td,
.table > thead > tr.active > th,
.table > tbody > tr.active > th,
.table > tfoot > tr.active > th {
  background-color: #f4f8fb !important;
}
.table > thead > tr > th,
.table > tbody > tr > th,
.table > tfoot > tr > th,
.table > thead > tr > td,
.table > tbody > tr > td,
.table > tfoot > tr > td,
.table > thead > tr > th,
.table-bordered {
  border-top: 1px solid #ebeff2;
}
.table-bordered > thead > tr > th,
.table-bordered > tbody > tr > th,
.table-bordered > tfoot > tr > th,
.table-bordered > thead > tr > td,
.table-bordered > tbody > tr > td,
.table-bordered > tfoot > tr > td {
  border: 1px solid #ebeff2;
}
.table > thead > tr > th {
  vertical-align: bottom;
  border-bottom: 2px solid #ebeff2;
}
tbody {
  color: #797979;
}
th {
  color: #666666;
  font-weight: 600;
}
.table-bordered {
  border: 1px solid #ebeff2;
}
table.focus-on tbody tr.focused th {
  background-color: #5fbeaa;
  color: #ffffff;
}
table.focus-on tbody tr.focused td {
  background-color: #5fbeaa;
  color: #ffffff;
}
.table-rep-plugin .table-responsive {
  border: none !important;
}
.table-rep-plugin tbody th {
  font-size: 14px;
  font-weight: normal;
}
.table-rep-plugin .checkbox-row {
  padding-left: 40px;
}
.table-rep-plugin .checkbox-row label {
  display: inline-block;
  padding-left: 5px;
  position: relative;
}
.table-rep-plugin .checkbox-row label::before {
  -o-transition: 0.3s ease-in-out;
  -webkit-transition: 0.3s ease-in-out;
  background-color: #ffffff;
  border-radius: 3px;
  border: 1px solid #cccccc;
  content: "";
  display: inline-block;
  height: 17px;
  left: 0;
  margin-left: -20px;
  position: absolute;
  transition: 0.3s ease-in-out;
  width: 17px;
  outline: none !important;
}
.table-rep-plugin .checkbox-row label::after {
  color: #555555;
  display: inline-block;
  font-size: 11px;
  height: 16px;
  left: 0;
  margin-left: -20px;
  padding-left: 3px;
  padding-top: 1px;
  position: absolute;
  top: -1px;
  width: 16px;
}
.table-rep-plugin .checkbox-row input[type="checkbox"] {
  cursor: pointer;
  opacity: 0;
  z-index: 1;
  outline: none !important;
}
.table-rep-plugin .checkbox-row input[type="checkbox"]:disabled + label {
  opacity: 0.65;
}
.table-rep-plugin .checkbox-row input[type="checkbox"]:focus + label::before {
  outline-offset: -2px;
  outline: none;
}
.table-rep-plugin .checkbox-row input[type="checkbox"]:checked + label::after {
  content: "\f00c";
  font-family: 'FontAwesome';
}
.table-rep-plugin .checkbox-row input[type="checkbox"]:disabled + label::before {
  background-color: #eeeeee;
  cursor: not-allowed;
}
.table-rep-plugin .checkbox-row input[type="checkbox"]:checked + label::before {
  background-color: #5fbeaa;
  border-color: #5fbeaa;
}
.table-rep-plugin .checkbox-row input[type="checkbox"]:checked + label::after {
  color: #ffffff;
}
.fixed-table-container tbody .selected td {
  background-color: #F4F8FB;
}
.modal-block {
  background: transparent;
  margin: 40px auto;
  max-width: 600px;
  padding: 0;
  position: relative;
  text-align: left;
}
/* Data table */
#datatable-editable .actions a {
  padding: 5px;
}
#datatable-editable .form-control {
  background-color: #ffffff;
  width: 100%;
}
#datatable-editable .fa-trash-o {
  color: #f05050;
}
#datatable-editable .fa-times {
  color: #f05050;
}
#datatable-editable .fa-pencil {
  color: #29b6f6;
}
#datatable-editable .fa-save {
  color: #33b86c;
}
#datatable td {
  font-weight: normal;
}
div.dataTables_paginate ul.pagination {
  margin-top: 30px;
}
div.dataTables_info {
  padding-top: 38px;
}
/* Footable */
.footable-odd {
  background-color: #ffffff;
}
.footable-detail-show {
  background-color: #ebeff2;
}
.footable-row-detail {
  background-color: #F0F4F7;
}
/* Bootstrap Table */
.fixed-table-pagination .pagination-detail,
.fixed-table-pagination div.pagination {
  margin-top: 20px;
}
.fixed-table-container {
  border: 1px solid #ebeff2 !important;
}
.bootstrap-table .table > thead > tr > th {
  border-bottom: 2px solid #ebeff2;
  background: #ebeff2;
}
.fixed-table-container thead th .th-inner {
  padding: 9px 12px;
}
.bootstrap-table .table,
.bootstrap-table .table > tbody > tr > td,
.bootstrap-table .table > tbody > tr > th,
.bootstrap-table .table > tfoot > tr > td,
.bootstrap-table .table > tfoot > tr > th,
.bootstrap-table .table > thead > tr > td {
  padding: 8px 12px !important;
}
/* =============
   Widget
============= */
/* Widget-box styles */
.widget-box-1 i.inform {
  font-size: 20px;
  cursor: pointer;
}
.widget-box-1 h4 {
  margin-bottom: 5px;
  margin-top: 0px;
}
.widget-box-1 h2 {
  margin: 20px;
  font-weight: 600;
}
.widget-box-1 p {
  margin-bottom: 0px;
}
.widget-s-1 {
  border-radius: 6px;
}
/* Widget (background-icon) */
.widget-bg-color-icon .bg-icon {
  height: 80px;
  width: 80px;
  text-align: center;
  -webkit-border-radius: 50%;
  border-radius: 50%;
  -moz-border-radius: 50%;
  background-clip: padding-box;
}
.widget-bg-color-icon .bg-icon i {
  font-size: 32px;
  line-height: 80px;
}
.widget-bg-color-icon .bg-icon-info {
  background-color: rgba(52, 211, 235, 0.2);
  border: 1px solid #34d3eb;
}
.widget-bg-color-icon .bg-icon-primary {
  background-color: rgba(93, 156, 236, 0.2);
  border: 1px solid #5d9cec;
}
.widget-bg-color-icon .bg-icon-pink {
  background-color: rgba(251, 109, 157, 0.2);
  border: 1px solid #fb6d9d;
}
.widget-bg-color-icon .bg-icon-purple {
  background-color: rgba(114, 102, 186, 0.2);
  border: 1px solid #7266ba;
}
.widget-bg-color-icon .bg-icon-success {
  background-color: rgba(129, 200, 104, 0.2);
  border: 1px solid #81c868;
}
.widget-bg-color-icon .bg-icon-custom {
  background-color: rgba(95, 190, 170, 0.2);
  border: 1px solid #5fbeaa;
}
.widget-bg-color-icon .bg-icon-warning {
  background-color: rgba(255, 189, 74, 0.2);
  border: 1px solid #ffbd4a;
}
.widget-bg-color-icon .bg-icon-danger {
  background-color: rgba(240, 80, 80, 0.2);
  border: 1px solid #f05050;
}
.widget-bg-color-icon .bg-icon-inverse {
  background-color: rgba(76, 86, 103, 0.2);
  border: 1px solid #4c5667;
}
.mini-stat-icon {
  -moz-border-radius: 100%;
  -webkit-border-radius: 100%;
  border-radius: 100%;
  background-color: rgba(255, 255, 255, 0.2);
  display: inline-block;
  float: left;
  font-size: 30px;
  height: 60px;
  line-height: 60px;
  margin-right: 10px;
  text-align: center;
  width: 60px;
}
.mini-stat-info {
  padding-top: 2px;
  color: #eeeeee;
}
.mini-stat-info span {
  color: #ffffff;
  display: block;
  font-size: 24px;
  font-weight: 600;
}
.mini-stat-info span.name {
  color: #ffffff;
  display: block;
  font-size: 18px;
  font-weight: 600;
  margin-top: 5px;
}
.widget-inline {
  padding: 20px 0px !important;
}
.widget-inline .col-lg-3 {
  padding: 0px;
}
.widget-inline .widget-inline-box {
  border-right: 1px solid #e3e8f1;
  padding: 20px;
}
.widget-inline .widget-inline-box i {
  font-size: 32px;
}
/* Inbox-widget */
.inbox-widget .inbox-item {
  border-bottom: 1px solid #f1f1f1;
  overflow: hidden;
  padding: 10px 0;
  position: relative;
}
.inbox-widget .inbox-item .inbox-item-img {
  display: block;
  float: left;
  margin-right: 15px;
  width: 40px;
}
.inbox-widget .inbox-item img {
  width: 40px;
}
.inbox-widget .inbox-item .inbox-item-author {
  color: #333333;
  display: block;
  margin: 0;
}
.inbox-widget .inbox-item .inbox-item-text {
  color: #a0a0a0;
  display: block;
  font-size: 12px;
  margin: 0;
}
.inbox-widget .inbox-item .inbox-item-date {
  color: #a9a9a9;
  font-size: 11px;
  position: absolute;
  right: 7px;
  top: 2px;
}
/* Chat widget */
.conversation-list {
  list-style: none;
  height: 332px;
  padding: 0px 20px;
}
.conversation-list li {
  margin-bottom: 24px;
}
.conversation-list .chat-avatar {
  display: inline-block;
  float: left;
  text-align: center;
  width: 42px;
}
.conversation-list .chat-avatar img {
  border-radius: 100%;
  width: 100%;
}
.conversation-list .chat-avatar i {
  font-size: 12px;
  font-style: normal;
}
.conversation-list .ctext-wrap {
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  background: #f4f8fb;
  border-radius: 3px;
  display: inline-block;
  padding: 12px;
  position: relative;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
}
.conversation-list .ctext-wrap i {
  color: #1a2942;
  display: block;
  font-size: 12px;
  font-style: normal;
  font-weight: bold;
  position: relative;
}
.conversation-list .ctext-wrap p {
  margin: 0px;
  padding-top: 3px;
}
.conversation-list .ctext-wrap:after {
  right: 100%;
  top: 0%;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
  border-top-color: #f4f8fb;
  border-width: 8px;
  margin-left: -1px;
  border-right-color: #f4f8fb;
}
.conversation-list .conversation-text {
  display: inline-block;
  float: left;
  font-size: 12px;
  margin-left: 12px;
  width: 70%;
}
.conversation-list .odd .chat-avatar {
  float: right !important;
}
.conversation-list .odd .conversation-text {
  float: right !important;
  margin-right: 12px;
  text-align: right;
  width: 70% !important;
}
.conversation-list .odd .ctext-wrap:after {
  border-color: rgba(238, 238, 242, 0) !important;
  border-left-color: #f4f8fb !important;
  border-top-color: #f4f8fb !important;
  left: 100% !important;
  margin-right: -1px;
}
.chat-send {
  padding-left: 0px;
  padding-right: 30px;
}
.chat-send button {
  width: 100%;
}
.chat-inputbar {
  padding-left: 30px;
}
/* Todos widget */
#todo-message {
  font-size: 16px;
}
.todo-list li {
  border-bottom: 1px solid #eeeeee;
  border-radius: 0px;
  border: 0px;
  margin: 0px;
  padding: 1px;
  color: #98a6ad;
}
.todo-list li:last-of-type {
  border-bottom: none;
}
.todo-send {
  padding-left: 0px;
}
/* Widget-chart */
.widget-chart ul li {
  width: 31.5%;
  display: inline-block;
  padding: 0px;
}
.widget-panel {
  padding: 30px 20px;
  padding-left: 30px;
  border-radius: 4px;
  position: relative;
  margin-bottom: 20px;
}
.widget-panel i {
  font-size: 60px;
  padding: 30px;
  background: rgba(255, 255, 255, 0.2);
  position: absolute;
  right: 0px;
  bottom: 0px;
  top: 0px;
  line-height: 60px;
}
.widget-style-2 i {
  background: rgba(244, 248, 251, 0.6) !important;
  font-size: 48px;
  padding: 30px 40px;
}
/* Google maps */
.gmap iframe {
  width: 100%;
  margin: 0px !important;
  padding: 0px !important;
}
.gmap-info:before {
  color: #333333;
  content: "\f041";
  font-family: "FontAwesome";
  font-size: 35px;
  left: 10px;
  position: absolute;
  top: 8px;
}
.gmap-info {
  float: left;
  padding: 0 20px 0 50px;
  position: relative;
}
.gmap-buttons {
  float: right;
  margin-top: 28px;
}
.gmap-buttons .btn {
  margin-left: 3px;
}
/* Google maps ends */
/* Table with Action */
.table-actions-bar tr td {
  vertical-align: middle !important;
}
.table-actions-bar .table-action-btn {
  color: #98a6ad;
  display: inline-block;
  width: 28px;
  border-radius: 50%;
  text-align: center;
  line-height: 24px;
  font-size: 20px;
}
.table-actions-bar .table-action-btn:hover {
  color: #5fbeaa;
  border-color: #5fbeaa;
}
/* Transaction */
.transaction-list li {
  padding: 7px 0px;
  border-bottom: 1px solid #ebeff2;
  clear: both;
  position: relative;
}
.transaction-list i {
  width: 20px;
  position: absolute;
  top: 10px;
  font-size: 12px;
}
.transaction-list .tran-text {
  padding-left: 25px;
  white-space: nowrap;
  display: inline-block;
  overflow: hidden;
  text-overflow: ellipsis;
  width: 115px;
}
.transaction-list .tran-price {
  margin-left: 30px;
}
/* Friend list */
.friend-list a {
  margin: 5px;
  display: inline-block;
}
.friend-list .extra-number {
  height: 48px;
  width: 48px;
  display: block;
  line-height: 48px;
  color: #98a6ad;
  font-weight: 700;
  background-color: #ebeff2;
  border-radius: 50%;
  border: 1px solid #98a6ad;
}
/* Profile widget */
.profile-widget .bg-profile {
  height: 125px;
}
.profile-widget .img-thumbnail {
  margin-top: -42px;
  border: none;
}
.profile-widget .widget-list {
  padding: 10px;
  margin-top: 20px;
  margin-left: 0px;
  padding-bottom: 30px;
}
.profile-widget .widget-list span {
  display: block;
  font-weight: bold;
  font-size: 18px;
}
/*  Bar widget */
.bar-widget .iconbox {
  display: inline-block;
  height: 50px;
  width: 50px;
  margin-right: 20px;
  -webkit-border-radius: 50%;
  border-radius: 50%;
  -moz-border-radius: 50%;
  background-clip: padding-box;
  color: #ffffff;
  text-align: center;
}
.bar-widget .iconbox i {
  line-height: 50px;
  font-size: 20px;
}
/* =============
   Form elements
============= */
.error {
  color: #f05050;
  font-size: 12px;
  font-weight: 500;
}
.parsley-error {
  border-color: #f05050 !important;
}
.parsley-errors-list {
  display: none;
  margin: 0;
  padding: 0;
}
.parsley-errors-list.filled {
  display: block;
}
.parsley-errors-list > li {
  font-size: 12px;
  list-style: none;
  color: #f6504d;
}
.datepicker {
  padding: 8px;
}
.datepicker th {
  font-size: 14px !important;
}
.datepicker table tr td.today,
.datepicker table tr td.today:hover,
.datepicker table tr td.today.disabled,
.datepicker table tr td.today.disabled:hover,
.datepicker table tr td.selected,
.datepicker table tr td.selected:hover,
.datepicker table tr td.selected.disabled,
.datepicker table tr td.selected.disabled:hover,
.datepicker table tr td span.active,
.datepicker table tr td span.active:hover,
.datepicker table tr td span.active.disabled,
.datepicker table tr td span.active.disabled:hover {
  background-image: none;
}
.datepicker table tr td span.active:hover,
.datepicker table tr td span.active:hover:hover,
.datepicker table tr td span.active.disabled:hover,
.datepicker table tr td span.active.disabled:hover:hover,
.datepicker table tr td span.active:active,
.datepicker table tr td span.active:hover:active,
.datepicker table tr td span.active.disabled:active,
.datepicker table tr td span.active.disabled:hover:active,
.datepicker table tr td span.active.active,
.datepicker table tr td span.active:hover.active,
.datepicker table tr td span.active.disabled.active,
.datepicker table tr td span.active.disabled:hover.active,
.datepicker table tr td span.active.disabled,
.datepicker table tr td span.active:hover.disabled,
.datepicker table tr td span.active.disabled.disabled,
.datepicker table tr td span.active.disabled:hover.disabled,
.datepicker table tr td span.active[disabled],
.datepicker table tr td span.active:hover[disabled],
.datepicker table tr td span.active.disabled[disabled],
.datepicker table tr td span.active.disabled:hover[disabled] {
  background-color: #5fbeaa;
}
.datepicker table tr td.active,
.datepicker table tr td.active:hover,
.datepicker table tr td.active.disabled,
.datepicker table tr td.active.disabled:hover {
  background-color: #5fbeaa !important;
  background-image: none;
  box-shadow: none;
  text-shadow: none;
}
.datepicker thead tr:first-child th:hover,
.datepicker tfoot tr th:hover {
  background-color: #fafafa;
}
.datepicker-inline {
  border: 2px solid #eeeeee;
}
.daterangepicker td.active,
.daterangepicker td.active:hover {
  background-color: #5d9cec;
  border-color: #5d9cec;
}
.daterangepicker .input-mini.active {
  border: 1px solid #AAAAAA;
}
.daterangepicker .ranges li {
  -webkit-border-radius: 2px;
  border-radius: 2px;
  -moz-border-radius: 2px;
  background-clip: padding-box;
  color: #36404a;
  font-weight: 600;
  font-size: 12px;
}
.daterangepicker select.hourselect,
.daterangepicker select.minuteselect,
.daterangepicker select.secondselect,
.daterangepicker select.ampmselect {
  border: 1px solid #e3e3e3;
  padding: 2px;
  width: 60px;
}
.daterangepicker .ranges li.active,
.daterangepicker .ranges li:hover {
  background-color: #5d9cec;
  border: 1px solid #5d9cec;
}
.search-input {
  margin-bottom: 10px;
}
.ms-selectable {
  box-shadow: none;
  outline: none !important;
}
.ms-container .ms-list.ms-focus {
  box-shadow: none;
}
.ms-container .ms-selectable li.ms-hover {
  background-color: #5d9cec;
}
.ms-container .ms-selection li.ms-hover {
  background-color: #5d9cec;
}
.note-editor {
  border: 1px solid #eeeeee;
  position: relative;
}
.note-editor .note-toolbar {
  background-color: #f4f8fb;
  border-bottom: 1px solid #eeeeee;
  margin: 0;
}
.note-editor .note-statusbar {
  background-color: #ffffff;
}
.note-editor .note-statusbar .note-resizebar {
  border-top: none;
  height: 15px;
  padding-top: 3px;
}
.note-popover .popover .popover-content {
  padding: 5px 0 10px 5px;
}
.note-toolbar {
  padding: 5px 0 10px 5px;
}
.code-edit-wrap {
  padding: 0px !important;
}
.cm-s-ambiance .CodeMirror-linenumber {
  color: #bcbcbc;
}
.cm-s-ambiance .CodeMirror-gutters {
  background-color: #4c5667 !important;
  box-shadow: none;
}
.cm-s-ambiance.CodeMirror {
  background-color: #4c5667 !important;
  box-shadow: none;
}
.bootstrap-timepicker-widget table td a:hover {
  background-color: transparent;
  border-color: transparent;
  border-radius: 4px;
  color: #5d9cec;
  text-decoration: none;
}
.editor-horizontal .popover-content {
  padding: 9px 30px;
}
.wizard > .content {
  background: #ffffff;
  min-height: 240px;
  padding: 20px;
}
.wizard > .content > .body {
  padding: 0px;
}
.wizard > .content > .body input {
  border: 1px solid #E3E3E3;
}
.wizard > .content > .body ul > li {
  display: block;
  line-height: 30px;
}
.wizard > .content > .body label.error {
  color: #f05050;
  margin-left: 0;
}
.wizard > .content > .body label {
  display: inline-block;
  margin-top: 10px;
}
.wizard > .steps .number {
  border-radius: 50%;
  background-color: rgba(255, 255, 255, 0.3);
  display: inline-block;
  line-height: 30px;
  margin-right: 10px;
  width: 30px;
  text-align: center;
}
.wizard > .steps .disabled a {
  background: #ffffff;
  color: #333333;
  cursor: default;
  border: 1px solid #eaeaea;
}
.wizard > .steps .disabled a:hover {
  background: #f9f9f9;
  color: #333333;
  cursor: default;
  border: 1px solid #eaeaea;
}
.wizard > .steps .disabled a:active {
  background: #f9f9f9;
  color: #333333;
  cursor: default;
  border: 1px solid #eaeaea;
}
.wizard > .steps .current a {
  background: #5fbeaa;
}
.wizard > .steps .current a:hover {
  background: #5fbeaa;
}
.wizard > .steps .current a:hover .number {
  color: #ffffff;
}
.wizard > .steps .current a:active {
  background: #5fbeaa;
}
.wizard > .steps .current a:active .number {
  color: #ffffff;
}
.wizard > .steps .current a .number {
  color: #ffffff;
}
.wizard > .steps .done a {
  background: #7a8c9a;
}
.wizard > .steps .done a:hover {
  background: #7a8c9a;
}
.wizard > .steps .done a:active {
  background: #7a8c9a;
}
.wizard > .steps a,
.wizard > .steps a:hover,
.wizard > .steps a:active,
.wizard > .content {
  border-radius: 2px;
}
.wizard > .actions a {
  background: #5fbeaa;
  border-radius: 2px;
  color: #ffffff;
}
.wizard > .actions a:hover {
  background: #5fbeaa;
  border-radius: 2px;
  color: #ffffff;
}
.wizard > .actions a:active {
  background: #5fbeaa;
  border-radius: 2px;
  color: #ffffff;
}
.wizard > .actions .disabled a {
  background: #ffffff;
  color: #333333;
  cursor: default;
  border: 1px solid #eaeaea;
}
.wizard > .actions .disabled a:hover {
  background: #f9f9f9;
  color: #333333;
  cursor: default;
  border: 1px solid #eaeaea;
}
.wizard > .actions .disabled a:active {
  background: #f9f9f9;
  color: #333333;
  cursor: default;
  border: 1px solid #eaeaea;
}
/* Dropzone */
.dropzone {
  min-height: 230px;
  border: 2px dashed rgba(0, 0, 0, 0.3);
  background: white;
  border-radius: 6px;
}
.dropzone .dz-message {
  font-size: 30px;
}
/* X-Editable */
.editable-click,
a.editable-click,
a.editable-click:hover {
  border: none;
}
/* Image crop */
.img-container,
.img-preview {
  background-color: #f7f7f7;
  overflow: hidden;
  width: 100%;
  text-align: center;
}
.img-container {
  min-height: 200px;
  max-height: 466px;
  margin-bottom: 20px;
}
@media (min-width: 768px) {
  .img-container {
    min-height: 466px;
  }
}
.img-container > img {
  max-width: 100%;
}
.docs-preview {
  margin-right: -15px;
  margin-bottom: 10px;
}
.img-preview {
  float: left;
  margin-right: 10px;
  margin-bottom: 10px;
}
.img-preview > img {
  max-width: 100%;
}
/* Sweet Alert */
.sweet-alert p {
  font-size: 14px;
  font-weight: 400;
  line-height: 22px;
}
button.confirm {
  background-color: #5fbeaa !important;
  box-shadow: none !important;
}
@import url(https://fonts.googleapis.com/css?family=Noto+Sans:400,700);
@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300);

body {
  background: #ebeff2;
  font-family: 'Noto Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
  margin: 0;
  overflow-x: hidden;
  color: #797979;
}
html {
  position: relative;
  min-height: 100%;
  background: #ebeff2;
}
h1,
h2,
h3,
h4,
h5,
h6 {
  color: #505458;
  font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
  margin: 10px 0;
}
h1 {
  line-height: 43px;
}
h2 {
  line-height: 35px;
}
h3 {
  line-height: 30px;
}
h3 small {
  color: #444444;
}
h4 {
  line-height: 22px;
}
h4 small {
  color: #444444;
}
h5 {
  font-size: 15px;
}
h5 small {
  color: #444444;
}
p {
  line-height: 1.6;
}
* {
  outline: none !important;
}
b {
  font-weight: 600;
}
a:hover {
  outline: 0;
  text-decoration: none;
}
a:active {
  outline: 0;
  text-decoration: none;
}
a:focus {
  outline: 0;
  text-decoration: none;
}
.container {
  width: auto;
}
.container-alt {
  margin-left: auto;
  margin-right: auto;
  padding-left: 15px;
  padding-right: 15px;
}
/* Footer */
.footer {
  border-top: 1px solid rgba(0, 0, 0, 0.1);
  bottom: 0px;
  color: #58666e;
  text-align: left !important;
  padding: 20px 30px;
  position: absolute;
  right: 0px;
  left: 240px;
}
#wrapper {
  height: 100%;
  overflow: hidden;
  width: 100%;
}
.page {
  bottom: 0;
  left: 0;
  right: 0;
  top: 0;
}
/* Page titles */
.page-title {
  font-size: 20px;
  font-weight: 600;
  margin-bottom: 0px;
  margin-top: 7px;
}
.page-title-alt {
  margin-bottom: 23px;
  margin-top: 10px;
}
.page-header {
  border-bottom: 1px solid #DBDDDE;
}
.header-title {
  text-transform: uppercase;
  font-size: 16px;
  font-weight: 600;
  letter-spacing: 0.04em;
  line-height: 16px;
  margin-bottom: 8px;
}
.social-links li a {
  -webkit-border-radius: 50%;
  background: #EFF0F4;
  border-radius: 50%;
  color: #7A7676;
  display: inline-block;
  height: 30px;
  line-height: 30px;
  text-align: center;
  width: 30px;
}
/*
File: Helper clasess
*/
.p-0 {
  padding: 0px !important;
}
.p-20 {
  padding: 20px !important;
}
.p-30 {
  padding: 30px !important;
}
.p-l-0 {
  padding-left: 0px !important;
}
.p-r-0 {
  padding-right: 0px !important;
}
.p-t-0 {
  padding-top: 0px !important;
}
.p-t-10 {
  padding-top: 10px !important;
}
.p-b-10 {
  padding-bottom: 10px !important;
}
.p-l-r-10 {
  padding-left: 10px;
  padding-right: 10px;
}
.m-0 {
  margin: 0px !important;
}
.m-r-5 {
  margin-right: 5px !important;
}
.m-r-10 {
  margin-right: 10px !important;
}
.m-r-15 {
  margin-right: 15px !important;
}
.m-l-5 {
  margin-left: 5px !important;
}
.m-l-10 {
  margin-left: 10px !important;
}
.m-l-15 {
  margin-left: 15px !important;
}
.m-t-5 {
  margin-top: 5px !important;
}
.m-t-0 {
  margin-top: 0px !important;
}
.m-t-10 {
  margin-top: 10px !important;
}
.m-t-15 {
  margin-top: 15px !important;
}
.m-t-20 {
  margin-top: 20px !important;
}
.m-t-30 {
  margin-top: 30px !important;
}
.m-t-40 {
  margin-top: 40px !important;
}
.m-b-0 {
  margin-bottom: 0px !important;
}
.m-b-5 {
  margin-bottom: 5px !important;
}
.m-b-10 {
  margin-bottom: 10px !important;
}
.m-b-15 {
  margin-bottom: 15px !important;
}
.m-b-20 {
  margin-bottom: 20px !important;
}
.m-b-30 {
  margin-bottom: 30px !important;
}
.w-xs {
  min-width: 80px;
}
.w-sm {
  min-width: 95px;
}
.w-md {
  min-width: 110px;
}
.w-lg {
  min-width: 140px;
}
.m-h-40 {
  min-height: 40px;
}
.m-h-50 {
  min-height: 50px;
}
.l-h-34 {
  line-height: 34px;
}
.font-600 {
  font-weight: 600;
}
.font-bold {
  font-weight: 700;
}
.font-normal {
  font-weight: normal;
}
.font-light {
  font-weight: 300;
}
.font-13 {
  font-size: 13px !important;
}
.wrapper-md {
  padding: 20px;
}
.pull-in {
  margin-left: -15px;
  margin-right: -15px;
}
.b-0 {
  border: none !important;
}
.vertical-middle {
  vertical-align: middle;
}
.bx-shadow {
  -moz-box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.1);
  -webkit-box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.1);
  box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.1);
}
.mx-box {
  max-height: 380px;
  min-height: 380px;
}
.thumb-sm {
  height: 32px;
  width: 32px;
}
.thumb-md {
  height: 48px;
  width: 48px;
}
.thumb-lg {
  height: 88px;
  width: 88px;
}
/* Table type box */
.table-box {
  display: table;
  height: 100%;
  width: 100%;
}
.table-box .table-detail {
  display: table-cell;
  vertical-align: middle;
}
/* Card Box */
.card-box {
  padding: 20px;
  border: 1px solid rgba(54, 64, 74, 0.05);
  -webkit-border-radius: 5px;
  border-radius: 5px;
  -moz-border-radius: 5px;
  background-clip: padding-box;
  margin-bottom: 20px;
  background-color: #ffffff;
}
.grid-structure .grid-container {
  background-color: #f4f8fb;
  margin-bottom: 10px;
  padding: 10px 20px;
}
.icon-list-demo div {
  cursor: pointer;
  line-height: 45px;
  white-space: nowrap;
  color: #75798B;
}
.icon-list-demo div:hover {
  color: #ffffff;
}
.icon-list-demo div p {
  margin-bottom: 0px;
}
.icon-list-demo i {
  -webkit-transition: all 0.2s;
  -webkit-transition: font-size 0.2s;
  display: inline-block;
  font-size: 18px;
  margin: 0;
  text-align: center;
  transition: all 0.2s;
  transition: font-size 0.2s;
  vertical-align: middle;
  width: 40px;
}
.icon-list-demo .col-md-4 {
  -webkit-border-radius: 3px;
  border-radius: 3px;
  -moz-border-radius: 3px;
  background-clip: padding-box;
}
.icon-list-demo .col-md-4:hover {
  background-color: #5fbeaa;
}
.icon-list-demo .col-md-4:hover i {
  -o-transform: scale(2);
  -webkit-transform: scale(2);
  moz-transform: scale(2);
  transform: scale(2);
}
.button-list {
  margin-left: -8px;
  margin-bottom: -12px;
}
.button-list .btn {
  margin-bottom: 12px;
  margin-left: 8px;
}
/*
File: Bootstrap-custom
*/
.row {
  margin-right: -10px;
  margin-left: -10px;
}
.col-lg-1,
.col-lg-10,
.col-lg-11,
.col-lg-12,
.col-lg-2,
.col-lg-3,
.col-lg-4,
.col-lg-5,
.col-lg-6,
.col-lg-7,
.col-lg-8,
.col-lg-9,
.col-md-1,
.col-md-10,
.col-md-11,
.col-md-12,
.col-md-2,
.col-md-3,
.col-md-4,
.col-md-5,
.col-md-6,
.col-md-7,
.col-md-8,
.col-md-9,
.col-sm-1,
.col-sm-10,
.col-sm-11,
.col-sm-12,
.col-sm-2,
.col-sm-3,
.col-sm-4,
.col-sm-5,
.col-sm-6,
.col-sm-7,
.col-sm-8,
.col-sm-9,
.col-xs-1,
.col-xs-10,
.col-xs-11,
.col-xs-12,
.col-xs-2,
.col-xs-3,
.col-xs-4,
.col-xs-5,
.col-xs-6,
.col-xs-7,
.col-xs-8,
.col-xs-9 {
  padding-left: 10px;
  padding-right: 10px;
}
.breadcrumb {
  background-color: transparent;
  margin-bottom: 15px;
  padding-top: 10px;
  padding-left: 0px;
}
/* Dropdown */
.dropdown-menu {
  padding: 4px 0;
  transition: all 300ms ease;
  -moz-transition: all 300ms ease;
  -webkit-transition: all 300ms ease;
  -o-transition: all 300ms ease;
  -ms-transition: all 300ms ease;
  border: 0;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
}
.dropdown-menu > li > a {
  padding: 6px 20px;
}
.dropdown-menu > .active > a,
.dropdown-menu > .active > a:hover,
.dropdown-menu > .active > a:focus {
  background-color: #f3f3f3;
  color: #36404a;
}
.dropup .dropdown-menu {
  box-shadow: 0px -1px 5px 0 rgba(0, 0, 0, 0.26);
}
/* Background colors */
.bg-custom {
  background-color: #5fbeaa !important;
}
.bg-primary {
  background-color: #5d9cec !important;
}
.bg-success {
  background-color: #81c868 !important;
}
.bg-info {
  background-color: #34d3eb !important;
}
.bg-warning {
  background-color: #ffbd4a !important;
}
.bg-danger {
  background-color: #f05050 !important;
}
.bg-muted {
  background-color: #f4f8fb !important;
}
.bg-inverse {
  background-color: #4c5667 !important;
}
.bg-purple {
  background-color: #7266ba !important;
}
.bg-pink {
  background-color: #fb6d9d !important;
}
.bg-white {
  background-color: #ffffff !important;
}
.bg-lightdark {
  background-color: #f4f8fb !important;
}
/* Text colors */
.text-custom {
  color: #5fbeaa;
}
.text-white {
  color: #ffffff;
}
.text-danger {
  color: #f05050;
}
.text-muted {
  color: #98a6ad;
}
.text-primary {
  color: #5d9cec;
}
.text-warning {
  color: #ffbd4a;
}
.text-success {
  color: #81c868;
}
.text-info {
  color: #34d3eb;
}
.text-inverse {
  color: #4c5667;
}
.text-pink {
  color: #fb6d9d;
}
.text-purple {
  color: #7266ba;
}
.text-dark {
  color: #797979 !important;
}
/* Form components */
textarea.form-control {
  min-height: 90px;
}
.form-control {
  background-color: #FFFFFF;
  border: 1px solid #E3E3E3;
  border-radius: 4px;
  color: #565656;
  padding: 7px 12px;
  height: 38px;
  max-width: 100%;
  -webkit-box-shadow: none;
  box-shadow: none;
  -webkit-transition: all 300ms linear;
  -moz-transition: all 300ms linear;
  -o-transition: all 300ms linear;
  -ms-transition: all 300ms linear;
  transition: all 300ms linear;
}
.form-control:focus {
  background-color: #FFFFFF;
  border: 1px solid #AAAAAA;
  -webkit-box-shadow: none;
  box-shadow: none;
  outline: 0 !important;
  color: #333333;
}
.input-lg {
  height: 46px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.3333333;
  border-radius: 6px;
}
.input-sm {
  height: 30px;
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
  border-radius: 3px;
}
.form-horizontal .form-group {
  margin-left: -10px;
  margin-right: -10px;
}
.form-control-feedback {
  line-height: 38px !important;
}
.input-group-btn .btn {
  padding: 8px 12px;
}
.input-group-btn .btn-sm {
  padding: 5px 10px;
}
.input-group-btn .btn-lg {
  padding: 10px 17px;
}
/* Labels */
.label {
  font-weight: 600;
  letter-spacing: 0.05em;
  padding: .3em .6em .3em;
}
.label-default {
  background-color: #5fbeaa;
}
.label-primary {
  background-color: #5d9cec;
}
.label-success {
  background-color: #81c868;
}
.label-info {
  background-color: #34d3eb;
}
.label-warning {
  background-color: #ffbd4a;
}
.label-danger {
  background-color: #f05050;
}
.label-purple {
  background-color: #7266ba;
}
.label-pink {
  background-color: #fb6d9d;
}
.label-inverse {
  background-color: #4c5667;
}
/* Badge */
.badge {
  text-transform: uppercase;
  font-weight: 600;
  padding: 3px 5px;
  font-size: 12px;
  margin-top: 1px;
  background-color: #5fbeaa;
}
.badge-xs {
  font-size: 9px;
}
.badge-xs,
.badge-sm {
  -webkit-transform: translate(0, -2px);
  -ms-transform: translate(0, -2px);
  -o-transform: translate(0, -2px);
  transform: translate(0, -2px);
}
.badge-primary {
  background-color: #5d9cec;
}
.badge-success {
  background-color: #81c868;
}
.badge-info {
  background-color: #34d3eb;
}
.badge-warning {
  background-color: #ffbd4a;
}
.badge-danger {
  background-color: #f05050;
}
.badge-purple {
  background-color: #7266ba;
}
.badge-pink {
  background-color: #fb6d9d;
}
.badge-inverse {
  background-color: #4c5667;
}
/* Pagination/ Pager */
.pagination > li:first-child > a,
.pagination > li:first-child > span {
  border-bottom-left-radius: 3px;
  border-top-left-radius: 3px;
}
.pagination > li:last-child > a,
.pagination > li:last-child > span {
  border-bottom-right-radius: 3px;
  border-top-right-radius: 3px;
}
.pagination > li > a,
.pagination > li > span {
  color: #636e7b;
}
.pagination > li > a:hover,
.pagination > li > span:hover,
.pagination > li > a:focus,
.pagination > li > span:focus {
  background-color: #e4e7ea;
}
.pagination-split li {
  margin-left: 5px;
  display: inline-block;
  float: left;
}
.pagination-split li:first-child {
  margin-left: 0;
}
.pagination-split li a {
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  border-radius: 3px;
}
.pagination > .active > a,
.pagination > .active > span,
.pagination > .active > a:hover,
.pagination > .active > span:hover,
.pagination > .active > a:focus,
.pagination > .active > span:focus {
  background-color: #5fbeaa;
  border-color: #5fbeaa;
}
.pager li > a,
.pager li > span {
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  color: #636e7b;
}
/* Tabs */
.tabs {
  background-color: #ffffff;
  margin: 0 auto;
  padding: 0px;
  position: relative;
  white-space: nowrap;
  width: 100%;
}
.tabs li.tab {
  background-color: #ffffff;
  display: block;
  float: left;
  margin: 0;
  text-align: center;
}
.tabs li.tab a {
  -moz-transition: color 0.28s ease;
  -ms-transition: color 0.28s ease;
  -o-transition: color 0.28s ease;
  -webkit-transition: color 0.28s ease;
  color: #9398a0;
  color: #ee6e73;
  display: block;
  height: 100%;
  text-decoration: none;
  transition: color 0.28s ease;
  width: 100%;
}
.tabs li.tab a.active {
  color: #5fbeaa !important;
}
.tabs .indicator {
  background-color: #5fbeaa;
  bottom: 0;
  height: 2px;
  position: absolute;
  will-change: left, right;
}
.tabs-top .indicator {
  top: 0;
}
.nav-pills li a {
  line-height: 36px !important;
}
.nav-pills li.active a {
  background-color: #5fbeaa !important;
}
.nav-pills li.active a:hover {
  background-color: #5fbeaa !important;
}
.nav-pills li.active a:focus {
  background-color: #5fbeaa !important;
}
.nav.nav-tabs + .tab-content {
  background: #ffffff;
  margin-bottom: 30px;
  padding: 30px;
}
.tabs-vertical-env {
  margin-bottom: 30px;
}
.tabs-vertical-env .tab-content {
  background: #ffffff;
  display: table-cell;
  margin-bottom: 30px;
  padding: 30px;
  vertical-align: top;
}
.tabs-vertical-env .nav.tabs-vertical {
  display: table-cell;
  min-width: 120px;
  vertical-align: top;
  width: 150px;
}
.tabs-vertical-env .nav.tabs-vertical li.active > a {
  background-color: #ffffff;
  border: 0;
}
.tabs-vertical-env .nav.tabs-vertical li > a {
  color: #333333;
  text-align: center;
  white-space: nowrap;
}
.nav.nav-tabs > li.active > a {
  background-color: #ffffff;
  border: 0;
}
.nav.nav-tabs > li > a,
.nav.tabs-vertical > li > a {
  background-color: transparent;
  border-radius: 0;
  border: none;
  color: #505461 !important;
  cursor: pointer;
  line-height: 50px;
  padding-left: 20px;
  padding-right: 20px;
  letter-spacing: 0.03em;
  font-weight: 600;
  text-transform: uppercase;
  font-family: "Source Sans Pro", "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
}
.nav.nav-tabs > li > a:hover,
.nav.tabs-vertical > li > a:hover {
  color: #5fbeaa !important;
}
.tab-content {
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
  color: #777777;
}
.nav.nav-tabs > li:last-of-type a {
  margin-right: 0px;
}
.nav.nav-tabs {
  border-bottom: 0;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
}
.navtab-bg {
  background-color: #f4f8fb;
}
.nav-tabs.nav-justified > .active > a,
.nav-tabs.nav-justified > .active > a:hover,
.nav-tabs.nav-justified > .active > a:focus,
.tabs-vertical-env .nav.tabs-vertical li.active > a {
  border: none;
}
.nav-tabs > li.active > a,
.nav-tabs > li.active > a:focus,
.nav-tabs > li.active > a:hover,
.tabs-vertical > li.active > a,
.tabs-vertical > li.active > a:focus,
.tabs-vertical > li.active > a:hover {
  color: #5fbeaa !important;
}
/* List group */
.list-group-item {
  border: 1px solid #ebeff2;
}
/* Dropcap */
.dropcap {
  font-size: 3.1em;
}
.dropcap,
.dropcap-circle,
.dropcap-square {
  display: block;
  float: left;
  font-weight: 400;
  line-height: 36px;
  margin-right: 6px;
  text-shadow: none;
}
/* Alert */
.alert .btn {
  margin-top: 10px;
}
.alert-success {
  background-color: rgba(95, 190, 170, 0.3);
  border-color: rgba(95, 190, 170, 0.4);
  color: #5fbeaa;
}
.alert-info {
  background-color: rgba(52, 211, 235, 0.2);
  border-color: rgba(52, 211, 235, 0.3);
  color: #34d3eb;
}
.alert-warning {
  background-color: rgba(255, 189, 74, 0.2);
  border-color: rgba(255, 189, 74, 0.3);
  color: #ffbd4a;
}
.alert-danger {
  background-color: rgba(240, 80, 80, 0.2);
  border-color: rgba(240, 80, 80, 0.3);
  color: #f05050;
}
/* Modals */
.modal .modal-dialog .modal-content {
  -moz-box-shadow: none;
  -webkit-box-shadow: none;
  border-color: #DDDDDD;
  border-radius: 2px;
  box-shadow: none;
  padding: 25px;
}
.modal .modal-dialog .modal-content .modal-header {
  border-bottom-width: 2px;
  margin: 0;
  padding: 0;
  padding-bottom: 15px;
}
.modal .modal-dialog .modal-content .modal-body {
  padding: 20px 0;
}
.modal .modal-dialog .modal-content .modal-footer {
  padding: 0;
  padding-top: 15px;
}
.modal-full {
  width: 98%;
}
.modal-content .nav.nav-tabs + .tab-content {
  margin-bottom: 0px;
}
.modal-content .panel-group {
  margin-bottom: 0px;
}
.modal-content .panel {
  border-top: none;
}
/* Custom-modal */
.modal-demo {
  background-color: #FFF;
  width: 600px;
  -webkit-border-radius: 4px;
  border-radius: 4px;
  -moz-border-radius: 4px;
  background-clip: padding-box;
  display: none;
}
.modal-demo .close {
  position: absolute;
  top: 15px;
  right: 25px;
  color: #eeeeee;
}
.custom-modal-title {
  padding: 15px 25px 15px 25px;
  line-height: 22px;
  font-size: 18px;
  background-color: #36404a;
  color: #ffffff;
  text-align: left;
  margin: 0px;
}
.custom-modal-text {
  padding: 20px;
}
.custombox-modal-flash .close,
.custombox-modal-rotatedown .close {
  top: 20px;
  z-index: 9999;
}
/* Tabs-Accordions */
.tabs-vertical-env .tab-content {
  margin-bottom: 0px;
}
.table > thead > tr > td.middle-align,
.table > tbody > tr > td.middle-align,
.table > .tfood > tr > td.middle-align,
.table > thead > tr > th.middle-align,
.table > tbody > tr > th.middle-align,
.table > .tfood > tr > th.middle-align {
  vertical-align: middle;
}
.list-group-item.active,
.list-group-item.active:hover,
.list-group-item.active:focus {
  background-color: #5fbeaa;
  border-color: #5fbeaa;
}
.nav-pills > .active > a > .badge {
  color: #5fbeaa;
}
.has-success .form-control {
  border-color: #81c868;
  box-shadow: none !important;
}
.has-warning .form-control {
  border-color: #ffbd4a;
  box-shadow: none !important;
}
.has-error .form-control {
  border-color: #f05050;
  box-shadow: none !important;
}
.input-group-addon {
  border-radius: 2px;
  border: 1px solid #eeeeee;
}
/* Tooltips */
.tooltip-inner {
  border-radius: 1px;
  padding: 6px 10px;
}
.jqstooltip {
  -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
  width: auto!important;
  height: auto!important;
}
/* Popover */
.popover {
  font-family: inherit;
  border: none;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  -moz-border-radius: 3px;
  background-clip: padding-box;
}
.popover .popover-title {
  background-color: transparent;
  color: #5fbeaa;
  font-weight: 600;
}
/* Code */
code {
  color: #5d9cec;
  background-color: #f4f8fb;
  border-radius: 4px;
}
/* Pre */
pre {
  background-color: #f4f8fb;
  border: 1px solid #d4d8da;
}
/* Carousel */
.carousel-control {
  width: 10%;
}
.carousel-control span {
  position: absolute;
  top: 50%;
  /* pushes the icon in the middle of the height */
  z-index: 5;
  display: inline-block;
  font-size: 30px;
}
/* Owl */
.slider-bg {
  background-size: cover !important;
  padding: 5.5% 4.5%;
}
/* Media */
.media {
  margin-bottom: 20px;
}
.media .media-heading {
  font-weight: 600;
  font-size: 16px;
}
.media:last-of-type {
  margin-bottom: 0px;
}
/*===================================
File: Topbar,Left-sidebar,Right-sidebar
  ===================================*/
.topbar {
  left: 0px;
  position: fixed;
  right: 0;
  top: 0px;
  z-index: 999;
}
.topbar .topbar-left {
  float: left;
  position: relative;
  width: 240px;
  z-index: 1;
}
.topbar .topbar-left-sm {
  width: 180px;
}
.logo {
  color: #ffffff !important;
  font-size: 20px;
  font-weight: 700;
  letter-spacing: .05em;
  line-height: 60px;
  text-transform: uppercase;
}
.logo h1 {
  height: 50px;
  margin: 0px auto;
  text-align: center;
}
.logo i {
  color: #5fbeaa;
}
.logo .icon-c-logo {
  display: none;
}
.navbar-default {
  background-color: #36404a;
  border-radius: 0px;
  border: none;
  margin-bottom: 0px;
}
.navbar-default .navbar-nav > .open > a {
  background-color: rgba(255, 255, 255, 0.1);
}
.navbar-default .navbar-nav > .open > a:focus {
  background-color: rgba(255, 255, 255, 0.1);
}
.navbar-default .navbar-nav > .open > a:hover {
  background-color: rgba(255, 255, 255, 0.1);
}
.navbar-default .badge {
  position: absolute;
  top: 12px;
  right: 7px;
}
.nav > li > a {
  color: #ffffff !important;
  line-height: 60px;
  padding: 0px 15px;
  position: relative;
}
.nav > li > a i {
  font-size: 16px;
}
.profile img {
  border: 2px solid #edf0f0;
  height: 36px;
  width: 36px;
}
.dropdown-menu-lg {
  width: 300px;
}
.dropdown-menu-lg .list-group {
  margin-bottom: 0px;
}
.dropdown-menu-lg .list-group-item {
  border: none;
  padding: 10px 20px;
}
.dropdown-menu-lg .media-heading {
  margin-bottom: 0px;
}
.dropdown-menu-lg .media-body p {
  color: #828282;
}
.notification-list {
  max-height: 230px;
}
.notification-list em {
  width: 34px;
  text-align: center;
}
.notification-list .media-body {
  display: inherit;
  width: auto;
  overflow: hidden;
  margin-left: 50px;
}
.notification-list .media-body h5 {
  text-overflow: ellipsis;
  white-space: nowrap;
  display: block;
  width: 100%;
  font-weight: normal;
  overflow: hidden;
}
.notifi-title {
  border-bottom: 1px solid rgba(0, 0, 0, 0.1);
  font-size: 15px;
  text-transform: uppercase;
  font-weight: 600;
  padding: 11px 20px 15px;
  color: #4c5667;
  font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
}
.navbar-nav {
  margin: 0px;
}
.side-menu {
  bottom: 0;
  top: 0;
  width: 240px;
  z-index: 2;
}
.side-menu.left {
  background: #ffffff;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  position: absolute;
  top: 60px;
}
body.fixed-left .side-menu.left {
  bottom: 50px;
  height: 100%;
  margin-bottom: -70px;
  margin-top: 0px;
  padding-bottom: 70px;
  position: fixed;
}
.content-page {
  margin-left: 240px;
  overflow: hidden;
}
.content-page > .content {
  margin-bottom: 60px;
  margin-top: 60px;
  padding: 20px 5px 15px 5px;
}
.button-menu-mobile {
  background: transparent;
  border: none;
  color: #cccccc;
  font-size: 21px;
  line-height: 60px;
  padding: 0px 15px;
}
.button-menu-mobile:hover {
  color: #ffffff;
}
.sidebar-inner {
  height: 100%;
}
#sidebar-menu,
#sidebar-menu ul,
#sidebar-menu li,
#sidebar-menu a {
  border: 0;
  font-weight: normal;
  line-height: 1;
  list-style: none;
  margin: 0;
  padding: 0;
  position: relative;
  text-decoration: none;
}
#sidebar-menu {
  padding-bottom: 30px;
  padding-top: 30px;
  width: 100%;
}
#sidebar-menu .nav > li > a .badge {
  position: absolute;
  right: 10px;
  top: 12px;
}
#sidebar-menu a {
  line-height: 1.3;
}
#sidebar-menu ul ul {
  display: none;
}
#sidebar-menu ul ul li {
  border-top: 0;
}
#sidebar-menu ul ul li.active a {
  color: #5fbeaa;
}
#sidebar-menu ul ul a {
  color: #75798B;
  display: block;
  padding: 10px 20px 10px 65px;
}
#sidebar-menu ul ul a:hover {
  color: #5fbeaa;
}
#sidebar-menu ul ul a i {
  margin-right: 5px;
}
#sidebar-menu ul ul ul a {
  padding-left: 80px;
}
#sidebar-menu .label {
  margin-top: 2px;
}
#sidebar-menu .subdrop {
  background: #f4f8fb !important;
  border-left: 3px solid #5fbeaa;
  color: #5fbeaa !important;
}
#sidebar-menu > ul > li > a {
  color: #36404a;
  display: block;
  padding: 12px 20px;
  margin: 4px 0px;
  border-left: 3px solid #ffffff;
}
#sidebar-menu > ul > li > a:hover {
  color: #5fbeaa;
  text-decoration: none;
}
#sidebar-menu > ul > li > a > span {
  vertical-align: middle;
}
#sidebar-menu ul li a i {
  display: inline-block;
  font-size: 16px;
  line-height: 17px;
  margin-left: 3px;
  margin-right: 15px;
  text-align: center;
  vertical-align: middle;
  width: 20px;
}
#sidebar-menu ul li a i.md {
  font-size: 18px;
}
#sidebar-menu > ul > li > a > i.i-right {
  float: right;
  margin: 3px 0 0 0;
}
#sidebar-menu > ul > li > a.active {
  background: #f4f8fb !important;
  border-left: 3px solid #5fbeaa;
  color: #5fbeaa !important;
}
.menu-title {
  padding: 12px 20px !important;
  letter-spacing: .035em;
  pointer-events: none;
  cursor: default;
  font-size: 13px;
}
/* Small Menu */
.side-menu-sm {
  width: 180px;
  text-align: center;
}
.side-menu-sm #sidebar-menu > ul > li > a > i {
  display: block;
  font-size: 18px;
  line-height: 24px;
  width: 100%;
  margin: 0px;
}
.side-menu-sm #sidebar-menu ul ul a {
  padding: 10px 20px 10px 20px;
}
.side-menu-sm + .content-page .footer {
  left: 180px;
}
#wrapper.enlarged .side-menu-sm {
  text-align: left;
}
#wrapper.enlarged .side-menu-sm #sidebar-menu ul li a i {
  display: inline-block;
  font-size: 18px;
  line-height: 17px;
  margin-left: 3px;
  margin-right: 15px;
  vertical-align: middle;
  width: 20px;
}
.side-menu-sm + .content-page {
  margin-left: 180px;
}
/* Header 2 */
.page-header-2 {
  background: #E3E7EC;
  border-bottom: 1px solid #dee2e8;
  margin: -25px -20px 22px -20px;
  padding: 25px 20px 0px 20px;
}
#wrapper.enlarged .menu-title {
  display: none;
}
#wrapper.enlarged #sidebar-menu ul ul {
  border: 2px solid #f4f8fb;
  margin-top: -5px;
  padding-top: 5px;
  z-index: 9999;
  background-color: #ffffff;
}
#wrapper.enlarged .left.side-menu {
  width: 70px;
  z-index: 5;
}
#wrapper.enlarged .left.side-menu #sidebar-menu > ul > li > a {
  padding: 15px 20px;
}
#wrapper.enlarged .left.side-menu #sidebar-menu > ul > li > a:hover {
  background: #f4f8fb!important;
}
#wrapper.enlarged .left.side-menu #sidebar-menu > ul > li > a:active {
  background: #f4f8fb!important;
}
#wrapper.enlarged .left.side-menu #sidebar-menu > ul > li > a:focus {
  background: #f4f8fb!important;
}
#wrapper.enlarged .left.side-menu #sidebar-menu > ul > li > a i {
  margin-right: 20px !important;
  font-size: 20px;
}
#wrapper.enlarged .left.side-menu .label {
  position: absolute;
  top: 5px;
  left: 35px;
  text-indent: 0;
  display: block !important;
  padding: .2em .6em .3em !important;
}
#wrapper.enlarged .left.side-menu #sidebar-menu ul > li {
  position: relative;
  white-space: nowrap;
}
#wrapper.enlarged .left.side-menu #sidebar-menu ul > li:hover > a {
  position: relative;
  width: 260px;
  background: #f4f8fb;
}
#wrapper.enlarged .left.side-menu #sidebar-menu ul > li:hover > ul {
  display: block;
  left: 70px;
  position: absolute;
  width: 190px;
}
#wrapper.enlarged .left.side-menu #sidebar-menu ul > li:hover > ul a {
  background: #ffffff;
  box-shadow: none;
  padding-left: 15px;
  position: relative;
  width: 186px;
  z-index: 6;
}
#wrapper.enlarged .left.side-menu #sidebar-menu ul > li:hover > ul a:hover {
  color: #5fbeaa;
}
#wrapper.enlarged .left.side-menu #sidebar-menu ul > li:hover a span {
  display: inline;
}
#wrapper.enlarged .left.side-menu #sidebar-menu a.subdrop {
  color: #5fbeaa !important;
}
#wrapper.enlarged .left.side-menu #sidebar-menu ul > li > ul {
  display: none;
}
#wrapper.enlarged .left.side-menu #sidebar-menu ul ul li:hover > ul {
  display: block;
  left: 190px;
  margin-top: -36px;
  position: absolute;
  width: 190px;
}
#wrapper.enlarged .left.side-menu #sidebar-menu ul ul li > a span.pull-right {
  -ms-transform: rotate(270deg);
  -webkit-transform: rotate(270deg);
  position: absolute;
  right: 20px;
  top: 12px;
  transform: rotate(270deg);
}
#wrapper.enlarged .left.side-menu #sidebar-menu ul ul li.active a {
  color: #5fbeaa;
}
#wrapper.enlarged .left.side-menu #sidebar-menu ul > li > a span {
  display: none;
  padding-left: 10px;
}
#wrapper.enlarged .left.side-menu .user-details {
  display: none;
}
#wrapper.enlarged .content-page {
  margin-left: 70px;
}
#wrapper.enlarged .footer {
  left: 70px;
}
#wrapper.enlarged .topbar .topbar-left {
  width: 70px !important;
}
#wrapper.enlarged .topbar .topbar-left .logo span {
  display: none;
  opacity: 0;
}
#wrapper.enlarged .topbar .topbar-left .logo .icon-c-logo {
  display: block;
  line-height: 60px;
}
#wrapper.enlarged #sidebar-menu > ul > li:hover > a.open :after {
  display: none;
}
#wrapper.enlarged #sidebar-menu > ul > li:hover > a.active :after {
  display: none;
}
#wrapper.enlarged .tips-box {
  display: none;
}
.tips-box .portlet {
  -webkit-box-shadow: 0px 0px 7px 1px rgba(0, 0, 0, 0.05);
  -moz-box-shadow: 0px 0px 7px 1px rgba(0, 0, 0, 0.05);
  box-shadow: 0px 0px 7px 1px rgba(0, 0, 0, 0.05);
}
.user-details {
  padding: 20px;
  padding-bottom: 0px;
  position: relative;
}
.user-details img {
  position: relative;
  z-index: 9999;
}
.user-details .user-info {
  color: #444444;
  margin-left: 60px;
  position: relative;
  z-index: 99999;
}
.user-details .user-info a.dropdown-toggle {
  color: #797979;
  display: block;
  font-family: 'Roboto', sans-serif;
  font-size: 16px;
  font-weight: 600;
  padding-top: 5px;
}
#wrapper.right-bar-enabled .right-bar {
  right: 0;
}
#wrapper.right-bar-enabled .left-layout {
  left: 0;
}
/* Right sidebar */
.side-bar.right-bar {
  float: right !important;
  right: -266px;
  top: 60px;
}
.side-bar {
  -moz-transition: all 200ms ease-out;
  -webkit-transition: all 200ms ease-out;
  background-color: #ffffff;
  box-shadow: 0px 0px 8px 1px rgba(0, 0, 0, 0.1);
  display: block;
  float: left;
  height: 100%;
  overflow-y: auto;
  position: fixed;
  transition: all 200ms ease-out;
  width: 240px;
}
.right-bar {
  background: #ffffff !important;
  z-index: 99 !important;
}
.right-bar h4 {
  border-bottom: 1px solid #eeeeee;
  padding-bottom: 10px;
}
.contact-list {
  max-height: 600px;
}
.contact-list .list-group-item {
  border: none;
}
.contact-list .list-group-item:hover {
  background: #ebeff2;
}
.contact-list i.offline {
  color: #f05050 !important;
}
.contact-list i.away {
  color: #ffbd4a;
}
.contacts-list .avatar {
  display: inline-block;
  float: left;
  margin-right: 5px;
  width: 30px;
}
.contacts-list .avatar img {
  border-radius: 50%;
  width: 100%;
}
.contacts-list .list-group-item span.name {
  color: #707780;
  display: inline-block;
  float: left;
  overflow: hidden;
  padding-left: 5px;
  padding-top: 6px;
  text-overflow: ellipsis;
  white-space: nowrap;
  width: 130px;
}
.contacts-list i {
  color: #7a8c9a;
  float: right;
  font-size: 9px;
  line-height: 30px;
}
.contacts-list i.online {
  color: #a0d269;
}
.contacts-list i.offline {
  color: #f05050 !important;
}
.contacts-list i.away {
  color: #ffbd4a;
}
.app-search {
  position: relative;
  margin: 15px 0px 15px 10px;
}
.app-search a {
  position: absolute;
  top: 5px;
  right: 20px;
  color: #c4c4cd;
}
.app-search .form-control,
.app-search .form-control:focus {
  border: none;
  font-size: 13px;
  color: #ffffff;
  padding-left: 20px;
  padding-right: 40px;
  background: rgba(255, 255, 255, 0.1);
  box-shadow: none;
  border-radius: 30px;
  height: 30px;
  font-weight: 600;
  width: 180px;
}
/* Animation */
/* Bounce 1 */
@-webkit-keyframes cd-bounce-1 {
  0% {
    opacity: 0;
    -webkit-transform: scale(0.5);
  }
  60% {
    opacity: 1;
    -webkit-transform: scale(1.2);
  }
  100% {
    -webkit-transform: scale(1);
  }
}
@-moz-keyframes cd-bounce-1 {
  0% {
    opacity: 0;
    -moz-transform: scale(0.5);
  }
  60% {
    opacity: 1;
    -moz-transform: scale(1.2);
  }
  100% {
    -moz-transform: scale(1);
  }
}
@-o-keyframes cd-bounce-1 {
  0% {
    opacity: 0;
    -o-transform: scale(0.5);
  }
  60% {
    opacity: 1;
    -o-transform: scale(1.2);
  }
  100% {
    -o-transform: scale(1);
  }
}
@keyframes cd-bounce-1 {
  0% {
    opacity: 0;
    -webkit-transform: scale(0.5);
    -moz-transform: scale(0.5);
    -ms-transform: scale(0.5);
    -o-transform: scale(0.5);
    transform: scale(0.5);
  }
  60% {
    opacity: 1;
    -webkit-transform: scale(1.2);
    -moz-transform: scale(1.2);
    -ms-transform: scale(1.2);
    -o-transform: scale(1.2);
    transform: scale(1.2);
  }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1);
  }
}
/* Bounce 2 */
@-webkit-keyframes cd-bounce-2 {
  0% {
    opacity: 0;
    -webkit-transform: translateX(-100px);
  }
  60% {
    opacity: 1;
    -webkit-transform: translateX(20px);
  }
  100% {
    -webkit-transform: translateX(0);
  }
}
@-moz-keyframes cd-bounce-2 {
  0% {
    opacity: 0;
    -moz-transform: translateX(-100px);
  }
  60% {
    opacity: 1;
    -moz-transform: translateX(20px);
  }
  100% {
    -moz-transform: translateX(0);
  }
}
@-o-keyframes cd-bounce-2 {
  0% {
    opacity: 0;
    -o-transform: translateX(-100px);
  }
  60% {
    opacity: 1;
    -o-transform: translateX(20px);
  }
  100% {
    opacity: 1;
    -o-transform: translateX(0);
  }
}
@keyframes cd-bounce-2 {
  0% {
    opacity: 0;
    -webkit-transform: translateX(-100px);
    -moz-transform: translateX(-100px);
    -ms-transform: translateX(-100px);
    -o-transform: translateX(-100px);
    transform: translateX(-100px);
  }
  60% {
    opacity: 1;
    -webkit-transform: translateX(20px);
    -moz-transform: translateX(20px);
    -ms-transform: translateX(20px);
    -o-transform: translateX(20px);
    transform: translateX(20px);
  }
  100% {
    opacity: 1;
    -webkit-transform: translateX(0);
    -moz-transform: translateX(0);
    -ms-transform: translateX(0);
    -o-transform: translateX(0);
    transform: translateX(0);
  }
}
/* Dropdown */
@-webkit-keyframes dropdownOpen {
  0% {
    opacity: 0;
    -webkit-transform: scale(0);
  }
  100% {
    -webkit-transform: scale(1);
  }
}
@-moz-keyframes dropdownOpen {
  0% {
    opacity: 0;
    -moz-transform: scale(0);
  }
  100% {
    -moz-transform: scale(1);
  }
}
@-o-keyframes dropdownOpen {
  0% {
    opacity: 0;
    -o-transform: scale(0);
  }
  100% {
    -o-transform: scale(1);
  }
}
@keyframes dropdownOpen {
  0% {
    opacity: 0;
    -webkit-transform: scale(0);
    -moz-transform: scale(0);
    -ms-transform: scale(0);
    -o-transform: scale(0);
    transform: scale(0);
  }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1);
  }
}
/* Progressbar Animated */
@-webkit-keyframes animationProgress {
  from {
    width: 0;
  }
}
@keyframes animationProgress {
  from {
    width: 0;
  }
}
/* Portlets loader */
@-webkit-keyframes loaderAnimate {
  0% {
    -webkit-transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(220deg);
  }
}
@-moz-keyframes loaderAnimate {
  0% {
    -moz-transform: rotate(0deg);
  }
  100% {
    -moz-transform: rotate(220deg);
  }
}
@-o-keyframes loaderAnimate {
  0% {
    -o-transform: rotate(0deg);
  }
  100% {
    -o-transform: rotate(220deg);
  }
}
@keyframes loaderAnimate {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(220deg);
  }
}
@-webkit-keyframes loaderAnimate2 {
  0% {
    box-shadow: inset #555 0 0 0 8px;
    -webkit-transform: rotate(-140deg);
  }
  50% {
    box-shadow: inset #555 0 0 0 2px;
  }
  100% {
    box-shadow: inset #555 0 0 0 8px;
    -webkit-transform: rotate(140deg);
  }
}
@-moz-keyframes loaderAnimate2 {
  0% {
    box-shadow: inset #555 0 0 0 8px;
    -moz-transform: rotate(-140deg);
  }
  50% {
    box-shadow: inset #555 0 0 0 2px;
  }
  100% {
    box-shadow: inset #555 0 0 0 8px;
    -moz-transform: rotate(140deg);
  }
}
@-o-keyframes loaderAnimate2 {
  0% {
    box-shadow: inset #555 0 0 0 8px;
    -o-transform: rotate(-140deg);
  }
  50% {
    box-shadow: inset #555 0 0 0 2px;
  }
  100% {
    box-shadow: inset #555 0 0 0 8px;
    -o-transform: rotate(140deg);
  }
}
@keyframes loaderAnimate2 {
  0% {
    box-shadow: inset #555 0 0 0 8px;
    -webkit-transform: rotate(-140deg);
    -moz-transform: rotate(-140deg);
    -ms-transform: rotate(-140deg);
    transform: rotate(-140deg);
  }
  50% {
    box-shadow: inset #555 0 0 0 2px;
  }
  100% {
    box-shadow: inset #555 0 0 0 8px;
    -webkit-transform: rotate(140deg);
    -moz-transform: rotate(140deg);
    -ms-transform: rotate(140deg);
    transform: rotate(140deg);
  }
}
@keyframes loaderAnimate2 {
  0% {
    box-shadow: inset #999 0 0 0 17px;
    transform: rotate(-140deg);
  }
  50% {
    box-shadow: inset #999 0 0 0 2px;
  }
  100% {
    box-shadow: inset #999 0 0 0 17px;
    transform: rotate(140deg);
  }
}
/*!
 * Waves v0.6.0
 * http://fian.my.id/Waves
 *
 * Copyright 2014 Alfiana E. Sibuea and other contributors
 * Released under the MIT license
 * https://github.com/fians/Waves/blob/master/LICENSE
 */
.waves-effect {
  position: relative;
  cursor: pointer;
  display: inline-block;
  overflow: hidden;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  -webkit-tap-highlight-color: transparent;
  vertical-align: middle;
  z-index: 1;
  will-change: opacity, transform;
  -webkit-transition: all 0.3s ease-out;
  -moz-transition: all 0.3s ease-out;
  -o-transition: all 0.3s ease-out;
  -ms-transition: all 0.3s ease-out;
  transition: all 0.3s ease-out;
}
.waves-effect .waves-ripple {
  position: absolute;
  border-radius: 50%;
  width: 20px;
  height: 20px;
  margin-top: -10px;
  margin-left: -10px;
  opacity: 0;
  background: rgba(0, 0, 0, 0.2);
  -webkit-transition: all 0.7s ease-out;
  -moz-transition: all 0.7s ease-out;
  -o-transition: all 0.7s ease-out;
  -ms-transition: all 0.7s ease-out;
  transition: all 0.7s ease-out;
  -webkit-transition-property: -webkit-transform, opacity;
  -moz-transition-property: -moz-transform, opacity;
  -o-transition-property: -o-transform, opacity;
  transition-property: transform, opacity;
  -webkit-transform: scale(0);
  -moz-transform: scale(0);
  -ms-transform: scale(0);
  -o-transform: scale(0);
  transform: scale(0);
  pointer-events: none;
}
.waves-effect.waves-light .waves-ripple {
  background-color: rgba(255, 255, 255, 0.45);
}
.waves-effect.waves-red .waves-ripple {
  background-color: rgba(244, 67, 54, 0.7);
}
.waves-effect.waves-yellow .waves-ripple {
  background-color: rgba(255, 235, 59, 0.7);
}
.waves-effect.waves-orange .waves-ripple {
  background-color: rgba(255, 152, 0, 0.7);
}
.waves-effect.waves-purple .waves-ripple {
  background-color: rgba(156, 39, 176, 0.7);
}
.waves-effect.waves-green .waves-ripple {
  background-color: rgba(76, 175, 80, 0.7);
}
.waves-effect.waves-teal .waves-ripple {
  background-color: rgba(0, 150, 136, 0.7);
}
.waves-notransition {
  -webkit-transition: none !important;
  -moz-transition: none !important;
  -o-transition: none !important;
  -ms-transition: none !important;
  transition: none !important;
}
.waves-circle {
  -webkit-transform: translateZ(0);
  -moz-transform: translateZ(0);
  -ms-transform: translateZ(0);
  -o-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-mask-image: -webkit-radial-gradient(circle, white 100%, black 100%);
  text-align: center;
  width: 2.5em;
  height: 2.5em;
  line-height: 2.5em;
  border-radius: 50%;
  -webkit-mask-image: none;
}
.waves-input-wrapper {
  border-radius: 0.2em;
  vertical-align: bottom;
}
.waves-input-wrapper .waves-button-input {
  position: relative;
  top: 0;
  left: 0;
  z-index: 1;
}
.waves-block {
  display: block;
}
#skip {
  position:absolute;
  top:165px;
  left: 800px;
}
    </style>
    
</head>
<body>
    
    <form method="post" >
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <div class="row"> 
              <div class="col-lg-4 col-lg-offset-4">
                <div class="card-box p-0">
                    <div class="profile-widget text-center">
                        <div class="bg-custom bg-profile"></div>
                        <h4>GOOGLE DRIVE </h4>
                        <button type="submit" class="btn btn-sm btn-warning m-t-20"> Push All Files </button>
                        
                        
                    </div>
                </div>
              </div>
          </div> 
    </form>
    <form method="post" action="/admin/drive/skip">
         <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
         <button type="submit" id="skip" class="btn btn-sm btn-primary m-t-20">  Skip  <i class="fa fa-angle-double-right"> </i></button>
    </form>
</body>
</html>
