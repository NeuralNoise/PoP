!function(){var e=Handlebars.template;(Handlebars.templates=Handlebars.templates||{})["layout-messagefeedbackframe"]=e({1:function(e,n,a,l,t,s,u){var r,o,i=e.lambda,c=e.escapeExpression,d=null!=n?n:e.nullContext||{},p=a.helperMissing;return'\t<div class="pop-messagefeedback '+c(i(null!=(r=null!=u[1]?u[1].tls:u[1])?r["domain-id"]:r,n))+" alert "+c(i(null!=u[1]?u[1].class:u[1],n))+" "+c((o=null!=(o=a.class||(null!=n?n.class:n))?o:p,"function"==typeof o?o.call(d,{name:"class",hash:{},data:t}):o))+' fade in" style="'+c((o=null!=(o=a.style||(null!=n?n.style:n))?o:p,"function"==typeof o?o.call(d,{name:"style",hash:{},data:t}):o))+'" '+(null!=(r=(a.generateId||n&&n.generateId||p).call(d,{name:"generateId",hash:{context:u[1]},fn:e.program(2,t,0,s,u),inverse:e.noop,data:t}))?r:"")+" "+(null!=(r=a.each.call(d,null!=u[1]?u[1].params:u[1],{name:"each",hash:{},fn:e.program(4,t,0,s,u),inverse:e.noop,data:t}))?r:"")+">\n\t\t"+(null!=(r=a.if.call(d,null!=n?n["can-close"]:n,{name:"if",hash:{},fn:e.program(6,t,0,s,u),inverse:e.noop,data:t}))?r:"")+"\n"+(null!=(r=(a.withModule||n&&n.withModule||p).call(d,u[1],"layout",{name:"withModule",hash:{},fn:e.program(8,t,0,s,u),inverse:e.noop,data:t}))?r:"")+"\t</div>\n"},2:function(e,n,a,l,t,s,u){return e.escapeExpression(e.lambda(null!=u[1]?u[1].id:u[1],n))},4:function(e,n,a,l,t){var s,u=e.escapeExpression;return" "+u((s=null!=(s=a.key||t&&t.key)?s:a.helperMissing,"function"==typeof s?s.call(null!=n?n:e.nullContext||{},{name:"key",hash:{},data:t}):s))+'="'+u(e.lambda(n,n))+'"'},6:function(e,n,a,l,t){return'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'},8:function(e,n,a,l,t,s,u){return"\t\t\t"+e.escapeExpression((a.enterModule||n&&n.enterModule||a.helperMissing).call(null!=n?n:e.nullContext||{},u[2],{name:"enterModule",hash:{"feedback-msg":u[1]},data:t}))+"\n"},compiler:[7,">= 4.0.0"],main:function(e,n,a,l,t,s,u){var r;return null!=(r=a.with.call(null!=n?n:e.nullContext||{},null!=n?n["feedback-msg"]:n,{name:"with",hash:{},fn:e.program(1,t,0,s,u),inverse:e.noop,data:t}))?r:""},useData:!0,useDepths:!0})}();