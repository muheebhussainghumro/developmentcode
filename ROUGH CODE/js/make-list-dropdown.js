jQuery(".wp-block-woocommerce-product-categories").prepend(
  '<label class="dropdown-label">Product Categories</label>'
);
jQuery("label").click(function () {
  jQuery(this).toggleClass("active");
  jQuery(".wc-block-product-categories-list-item").toggle();
});


@media (min-width:768px){
	div#block-3 .dropdown-label {
    display: none;
}
}
@media (max-width:767px){
	div#block-3 .wc-block-product-categories-list-item {
  display: none;
}
div#block-3 .dropdown-label:active + .wc-block-product-categories-list-item {
  display: block;
}
div#block-3 .dropdown-label.active {
    border-bottom: 2px solid #dbd6cf !important;
}
div#block-3 .dropdown-label {
    background: #eaeaea;
    padding: 15px;
    border: 2px solid #dbd6cf;
    display: block !important;
    font-size: 18px;
    line-height: 28px;
    font-weight: 400;
    font-style: italic;
    color: #000;
    border-bottom: none !important;
}
div#block-3 .dropdown-label:after {
  display: inline-block;
  line-height: inherit;
  content: '\e876';
  font-family: Linearicons-Free;
  font-style: normal;
  position: absolute;
  right: 20px;
  transition: 0.2s ease-in-out;
}
div#block-3 .dropdown-label.active:after {
    transform: rotate(90deg);
}
div#block-3 ul.wc-block-product-categories-list.wc-block-product-categories-list--depth-0 {
    background: #EAEAEA;
    border: 2px solid #DBD6CF;
    border-top: none !important;
}
div#block-3 ul.wc-block-product-categories-list.wc-block-product-categories-list--depth-0 > li {
   padding: 0 15px !important;
   font-size: 16px !important;
   font-style: italic !important;
}
div#block-3 ul.wc-block-product-categories-list.wc-block-product-categories-list--depth-0 > li:first-child {
    padding-top: 10px !important;
}
div#block-3 ul.wc-block-product-categories-list.wc-block-product-categories-list--depth-0 > li:last-child {
    padding-bottom: 10px !important;
}	
}
