!function(){var l=Handlebars.template;(Handlebars.templates=Handlebars.templates||{})["layout-styles"]=l({1:function(l,n,e,t,a,s,u){var r,i,o=null!=n?n:l.nullContext||{},d=e.helperMissing,c=l.lambda,m=l.escapeExpression;return'\t<style type="text/css" '+(null!=(r=(e.generateId||n&&n.generateId||d).call(o,{name:"generateId",hash:{context:u[1]},fn:l.program(2,a,0,s,u),inverse:l.noop,data:a}))?r:"")+">\n\t\tbody.loggedin-"+m(c(null!=(r=null!=u[1]?u[1].tls:u[1])?r["domain-id"]:r,n))+".user-"+m(c(null!=(r=null!=(r=null!=(r=null!=u[1]?u[1].tls:u[1])?r.feedback:r)?r.user:r)?r.id:r,n))+"-"+m(c(null!=(r=null!=u[1]?u[1].tls:u[1])?r["domain-id"]:r,n))+" "+m(c(null!=u[1]?u[1]["elem-target"]:u[1],n))+".target-"+m((i=null!=(i=e.id||(null!=n?n.id:n))?i:d,"function"==typeof i?i.call(o,{name:"id",hash:{},data:a}):i))+"-"+m(c(null!=(r=null!=u[1]?u[1].tls:u[1])?r["domain-id"]:r,n))+" {\n"+(null!=(r=e.each.call(o,null!=u[1]?u[1]["elem-styles"]:u[1],{name:"each",hash:{},fn:l.program(4,a,0,s,u),inverse:l.noop,data:a}))?r:"")+"\t\t}\n\t</style>\n"},2:function(l,n,e,t,a,s,u){return l.escapeExpression(l.lambda(null!=u[1]?u[1].id:u[1],n))},4:function(l,n,e,t,a){var s,u=l.escapeExpression;return"\t\t\t\t"+u((s=null!=(s=e.key||a&&a.key)?s:e.helperMissing,"function"==typeof s?s.call(null!=n?n:l.nullContext||{},{name:"key",hash:{},data:a}):s))+": "+u(l.lambda(n,n))+";\n"},compiler:[7,">= 4.0.0"],main:function(l,n,e,t,a,s,u){var r;return null!=(r=e.with.call(null!=n?n:l.nullContext||{},null!=n?n.itemObject:n,{name:"with",hash:{},fn:l.program(1,a,0,s,u),inverse:l.noop,data:a}))?r:""},useData:!0,useDepths:!0})}();