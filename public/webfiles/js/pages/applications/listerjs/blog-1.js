"use strict";$(document).ready(function(){new Lister({el:".blog-posts-1",url:lister_url,search:!1,per_page:6,templates:{row:function(t,n){return'\n\t\t\t\t\t\t<div class="col-md-6">\n\n\t\t\t\t\t\t\t<div class="card card-5 mt-24">\n\t\t\t\t\t\t\t\t<div class="row no-gutters">\n\t\t\t\t\t\t\t\t\t<div class="col-md-4 col-img" style="background-image: url(\''+ROOT_URL+t.image+'\');"></div>\n\t\t\t\t\t\t\t\t\t<div class="col-md-8">\n\t\t\t\t\t\t\t\t\t\t<div class="card-header">\n\t\t\t\t\t\t\t\t\t\t\t<div>\n\t\t\t\t\t\t\t\t\t\t\t\t<h5 class="card-title">'+t.title+'</h5>\n\t\t\t\t\t\t\t\t\t\t\t\t<small> <i class="fas fa-calendar"></i> '+t.date+'</small>\n\t\t\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t\t\t\t<span class="badge badge-'+t.category_color+'">'+t.category+'</span>\n\t\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t\t\t<div class="card-body">\n\t\t\t\t\t\t\t\t\t\t\t<p class="card-text">'+t.content+'</p>\n\t\t\t\t\t\t\t\t\t\t\t<button type="button" class="m-1 btn btn-has-icon btn-icon-split btn-primary">\n\t\t\t\t\t\t\t\t\t\t\t\t<span class="icon"><i class="fas fa-arrow-right"></i></span>\n\t\t\t\t\t\t\t\t\t\t\t\t<span>Read More</span>\n\t\t\t\t\t\t\t\t\t\t\t</button>\n\t\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t</div>\n\n\t\t\t\t\t\t</div>'},wrapper:function(){return'<div class="row lister-template-root"></div>'}}})});