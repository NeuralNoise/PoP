!function(){var n=Handlebars.template;(Handlebars.templates=Handlebars.templates||{})["layout-messagefeedback"]=n({1:function(n,l,e,a,t,s,i){var u,o=n.lambda,r=n.escapeExpression,c=null!=l?l:n.nullContext||{};return'\t<div class="media '+r(o(null!=i[1]?i[1].class:i[1],l))+'" style="'+r(o(null!=i[1]?i[1].style:i[1],l))+'">\n'+(null!=(u=e.if.call(c,null!=l?l.icon:l,{name:"if",hash:{},fn:n.program(2,t,0,s,i),inverse:n.noop,data:t}))?u:"")+'\t\t<div class="media-body">\n'+(null!=(u=e.if.call(c,null!=(u=null!=l?l.header:l)?u.code:u,{name:"if",hash:{},fn:n.program(4,t,0,s,i),inverse:n.noop,data:t}))?u:"")+(null!=(u=e.each.call(c,null!=l?l.codes:l,{name:"each",hash:{},fn:n.program(7,t,0,s,i),inverse:n.noop,data:t}))?u:"")+"\t\t\t"+(null!=(u=e.if.call(c,null!=l?l.codes:l,{name:"if",hash:{},fn:n.program(12,t,0,s,i),inverse:n.noop,data:t}))?u:"")+"\n"+(null!=(u=e.each.call(c,null!=l?l.strings:l,{name:"each",hash:{},fn:n.program(14,t,0,s,i),inverse:n.noop,data:t}))?u:"")+(null!=(u=e.if.call(c,null!=(u=null!=l?l.footer:l)?u.code:u,{name:"if",hash:{},fn:n.program(16,t,0,s,i),inverse:n.noop,data:t}))?u:"")+"\t\t</div>\n\t</div>\n"},2:function(n,l,e,a,t){var s;return'\t\t\t<div class="media-left">\n\t\t\t\t<span class="pop-messagefeedback-icon glyphicon '+n.escapeExpression((s=null!=(s=e.icon||(null!=l?l.icon:l))?s:e.helperMissing,"function"==typeof s?s.call(null!=l?l:n.nullContext||{},{name:"icon",hash:{},data:t}):s))+' media-object"></span>\n\t\t\t</div>\n'},4:function(n,l,e,a,t,s,i){var u;return null!=(u=(e.ifget||l&&l.ifget||e.helperMissing).call(null!=l?l:n.nullContext||{},null!=i[1]?i[1].messages:i[1],null!=(u=null!=l?l.header:l)?u.code:u,{name:"ifget",hash:{},fn:n.program(5,t,0,s,i),inverse:n.noop,data:t}))?u:""},5:function(n,l,e,a,t,s,i){var u;return'\t\t\t\t\t<h4 class="media-heading">'+(null!=(u=(e.get||l&&l.get||e.helperMissing).call(null!=l?l:n.nullContext||{},null!=i[1]?i[1].messages:i[1],null!=(u=null!=l?l.header:l)?u.code:u,{name:"get",hash:{},data:t}))?u:"")+"</h4>\n"},7:function(n,l,e,a,t,s,i){var u,o=null!=l?l:n.nullContext||{};return"\t\t\t\t"+(null!=(u=e.if.call(o,t&&t.index,{name:"if",hash:{},fn:n.program(8,t,0,s,i),inverse:n.noop,data:t}))?u:"")+"\n"+(null!=(u=(e.ifget||l&&l.ifget||e.helperMissing).call(o,null!=i[2]?i[2].messages:i[2],l,{name:"ifget",hash:{},fn:n.program(10,t,0,s,i),inverse:n.noop,data:t}))?u:"")},8:function(n,l,e,a,t){return"<br/>"},10:function(n,l,e,a,t,s,i){var u,o=null!=l?l:n.nullContext||{},r=e.helperMissing;return"\t\t\t\t\t"+(null!=(u=(e.formatFeedbackMessage||l&&l.formatFeedbackMessage||r).call(o,(e.get||l&&l.get||r).call(o,null!=i[2]?i[2].messages:i[2],l,{name:"get",hash:{},data:t}),{name:"formatFeedbackMessage",hash:{"is-multidomain":null!=(u=null!=i[2]?i[2].bs:i[2])?u["is-multidomain"]:u,domain:null!=(u=null!=i[2]?i[2].tls:i[2])?u.domain:u},data:t}))?u:"")+"\n"},12:function(n,l,e,a,t){var s;return null!=(s=e.if.call(null!=l?l:n.nullContext||{},null!=l?l.strings:l,{name:"if",hash:{},fn:n.program(8,t,0),inverse:n.noop,data:t}))?s:""},14:function(n,l,e,a,t,s,i){var u,o=null!=l?l:n.nullContext||{};return"\t\t\t\t"+(null!=(u=e.if.call(o,t&&t.index,{name:"if",hash:{},fn:n.program(8,t,0,s,i),inverse:n.noop,data:t}))?u:"")+"\n\t\t\t\t"+(null!=(u=(e.formatFeedbackMessage||l&&l.formatFeedbackMessage||e.helperMissing).call(o,l,{name:"formatFeedbackMessage",hash:{"is-multidomain":null!=(u=null!=i[2]?i[2].bs:i[2])?u["is-multidomain"]:u,domain:null!=(u=null!=i[2]?i[2].tls:i[2])?u.domain:u},data:t}))?u:"")+"\n"},16:function(n,l,e,a,t,s,i){var u;return null!=(u=(e.ifget||l&&l.ifget||e.helperMissing).call(null!=l?l:n.nullContext||{},null!=i[1]?i[1].messages:i[1],null!=(u=null!=l?l.footer:l)?u.code:u,{name:"ifget",hash:{},fn:n.program(17,t,0,s,i),inverse:n.noop,data:t}))?u:""},17:function(n,l,e,a,t,s,i){var u;return"\t\t\t\t\t"+(null!=(u=(e.get||l&&l.get||e.helperMissing).call(null!=l?l:n.nullContext||{},null!=i[1]?i[1].messages:i[1],null!=(u=null!=l?l.footer:l)?u.code:u,{name:"get",hash:{},data:t}))?u:"")+"\n"},compiler:[7,">= 4.0.0"],main:function(n,l,e,a,t,s,i){var u;return null!=(u=e.with.call(null!=l?l:n.nullContext||{},null!=l?l["feedback-msg"]:l,{name:"with",hash:{},fn:n.program(1,t,0,s,i),inverse:n.noop,data:t}))?u:""},useData:!0,useDepths:!0})}();