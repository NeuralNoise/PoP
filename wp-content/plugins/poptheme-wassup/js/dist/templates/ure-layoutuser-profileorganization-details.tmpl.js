!function(){var n=Handlebars.template,l=Handlebars.templates=Handlebars.templates||{};l["ure-layoutuser-profileorganization-details"]=n({1:function(n,l,a,e,s,t,r){var i;return(null!=(i=a["if"].call(l,null!=l?l["organizationtypes-strings"]:l,{name:"if",hash:{},fn:n.program(2,s,0,t,r),inverse:n.noop,data:s}))?i:"")+(null!=(i=a["if"].call(l,null!=l?l["organizationcategories-strings"]:l,{name:"if",hash:{},fn:n.program(4,s,0,t,r),inverse:n.noop,data:s}))?i:"")+(null!=(i=a["if"].call(l,null!=l?l["contact-person"]:l,{name:"if",hash:{},fn:n.program(6,s,0,t,r),inverse:n.noop,data:s}))?i:"")+(null!=(i=a["if"].call(l,null!=l?l["contact-number"]:l,{name:"if",hash:{},fn:n.program(8,s,0,t,r),inverse:n.noop,data:s}))?i:"")},2:function(n,l,a,e,s,t,r){var i,o=n.lambda,u=n.escapeExpression;return'		<p class="post-categories '+u(o(null!=r[1]?r[1]["class"]:r[1],l))+'">\n			<em>'+u(o(null!=(i=null!=r[1]?r[1].titles:r[1])?i.types:i,l))+"</em><br/>\n			"+u((a.labelize||l&&l.labelize||a.helperMissing).call(l,null!=l?l["organizationtypes-strings"]:l,null!=(i=null!=r[1]?r[1].classes:r[1])?i.label:i,{name:"labelize",hash:{},data:s}))+"\n		</p>\n"},4:function(n,l,a,e,s,t,r){var i,o=n.lambda,u=n.escapeExpression;return'		<p class="post-categories '+u(o(null!=r[1]?r[1]["class"]:r[1],l))+'">\n			<em>'+u(o(null!=(i=null!=r[1]?r[1].titles:r[1])?i.categories:i,l))+"</em><br/>\n			"+u((a.labelize||l&&l.labelize||a.helperMissing).call(l,null!=l?l["organizationcategories-strings"]:l,null!=(i=null!=r[1]?r[1].classes:r[1])?i.label2:i,{name:"labelize",hash:{},data:s}))+"\n		</p>\n"},6:function(n,l,a,e,s,t,r){var i,o,u=n.lambda,c=n.escapeExpression;return'		<p class="user-contactperson '+c(u(null!=r[1]?r[1]["class"]:r[1],l))+'">\n			<em>'+c(u(null!=(i=null!=r[1]?r[1].titles:r[1])?i.contactperson:i,l))+"</em><br/>\n			"+(null!=(o=null!=(o=a["contact-person"]||(null!=l?l["contact-person"]:l))?o:a.helperMissing,i="function"==typeof o?o.call(l,{name:"contact-person",hash:{},data:s}):o)?i:"")+"\n		</p>\n"},8:function(n,l,a,e,s,t,r){var i,o,u=n.lambda,c=n.escapeExpression;return'		<p class="user-contactnumber '+c(u(null!=r[1]?r[1]["class"]:r[1],l))+'">\n			<em>'+c(u(null!=(i=null!=r[1]?r[1].titles:r[1])?i.number:i,l))+"</em><br/>\n			"+(null!=(o=null!=(o=a["contact-number"]||(null!=l?l["contact-number"]:l))?o:a.helperMissing,i="function"==typeof o?o.call(l,{name:"contact-number",hash:{},data:s}):o)?i:"")+"\n		</p>\n"},compiler:[7,">= 4.0.0"],main:function(n,l,a,e,s,t,r){var i;return null!=(i=a["with"].call(l,null!=l?l.itemObject:l,{name:"with",hash:{},fn:n.program(1,s,0,t,r),inverse:n.noop,data:s}))?i:""},useData:!0,useDepths:!0})}();