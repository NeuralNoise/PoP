!function(){var n=Handlebars.template,e=Handlebars.templates=Handlebars.templates||{};e.block=n({1:function(n,e,l,a,t){return"pop-stopfetching"},3:function(n,e,l,a,t){var s;return n.escapeExpression((s=null!=(s=l.id||(null!=e?e.id:e))?s:l.helperMissing,"function"==typeof s?s.call(e,{name:"id",hash:{},data:t}):s))},5:function(n,e,l,a,t){var s,i=n.escapeExpression;return" "+i((s=null!=(s=l.key||t&&t.key)?s:l.helperMissing,"function"==typeof s?s.call(e,{name:"key",hash:{},data:t}):s))+'="'+i(n.lambda(e,e))+'"'},7:function(n,e,l,a,t,s,i){var o,r=n.escapeExpression;return'		<div class="blocksection-controls '+r(n.lambda(null!=(o=null!=i[1]?i[1].classes:i[1])?o["controlgroup-top"]:o,e))+'">\n			'+r((l.enterModule||e&&e.enterModule||l.helperMissing).call(e,i[1],{name:"enterModule",hash:{},data:t}))+"\n		</div>\n"},9:function(n,e,l,a,t){var s,i,o=n.lambda,r=n.escapeExpression,u=l.helperMissing,c="function";return'		<div class="blocksection-title '+r(o(null!=(s=null!=e?e.classes:e)?s["blocksection-title"]:s,e))+'">\n			<'+r((i=null!=(i=l["title-htmltag"]||(null!=e?e["title-htmltag"]:e))?i:u,typeof i===c?i.call(e,{name:"title-htmltag",hash:{},data:t}):i))+' class="title '+r(o(null!=(s=null!=e?e.classes:e)?s["block-title"]:s,e))+'">\n'+(null!=(s=l["if"].call(e,null!=(s=null!=(s=null!=e?e.bs:e)?s.feedback:s)?s["title-link"]:s,{name:"if",hash:{},fn:n.program(10,t,0),inverse:n.program(12,t,0),data:t}))?s:"")+"			</"+r((i=null!=(i=l["title-htmltag"]||(null!=e?e["title-htmltag"]:e))?i:u,typeof i===c?i.call(e,{name:"title-htmltag",hash:{},data:t}):i))+">\n		</div>\n"},10:function(n,e,l,a,t){var s,i=n.lambda;return'					<a href="'+n.escapeExpression(i(null!=(s=null!=(s=null!=e?e.bs:e)?s.feedback:s)?s["title-link"]:s,e))+'">'+(null!=(s=i(null!=(s=null!=(s=null!=e?e.bs:e)?s.feedback:s)?s.title:s,e))?s:"")+"</a>\n"},12:function(n,e,l,a,t){var s;return"					"+(null!=(s=n.lambda(null!=(s=null!=(s=null!=e?e.bs:e)?s.feedback:s)?s.title:s,e))?s:"")+"\n"},14:function(n,e,l,a,t){return'<div class="clearfix"></div>'},16:function(n,e,l,a,t,s,i){var o,r=n.escapeExpression;return'		<div class="blocksection-controls '+r(n.lambda(null!=(o=null!=i[1]?i[1].classes:i[1])?o["controlgroup-bottom"]:o,e))+'">\n			'+r((l.enterModule||e&&e.enterModule||l.helperMissing).call(e,i[1],{name:"enterModule",hash:{},data:t}))+"\n		</div>\n"},18:function(n,e,l,a,t,s,i){return'		<div class="blocksection-submenu">\n			'+n.escapeExpression((l.enterModule||e&&e.enterModule||l.helperMissing).call(e,i[1],{name:"enterModule",hash:{},data:t}))+"\n		</div>\n"},20:function(n,e,l,a,t,s,i){var o;return null!=(o=(l.withModule||e&&e.withModule||l.helperMissing).call(e,e,"filter",{name:"withModule",hash:{},fn:n.program(21,t,0,s,i),inverse:n.noop,data:t}))?o:""},21:function(n,e,l,a,t,s,i){return'			<div class="blocksection-filter">\n				'+n.escapeExpression((l.enterModule||e&&e.enterModule||l.helperMissing).call(e,i[1],{name:"enterModule",hash:{},data:t}))+"\n			</div>\n"},23:function(n,e,l,a,t,s,i){var o;return null!=(o=(l.withModule||e&&e.withModule||l.helperMissing).call(e,e,"messagefeedback",{name:"withModule",hash:{},fn:n.program(24,t,0,s,i),inverse:n.noop,data:t}))?o:""},24:function(n,e,l,a,t,s,i){return'			<div class="blocksection-messagefeedback">\n				'+n.escapeExpression((l.enterModule||e&&e.enterModule||l.helperMissing).call(e,i[1],{name:"enterModule",hash:{},data:t}))+"\n			</div>\n"},26:function(n,e,l,a,t){var s;return'		<div class="pop-disabledlayer hidden">\n			<div class="layer"></div>\n			<div class="spinner">\n				<div class="pop-box">\n					<div class="loading alert alert-warning alert-sm">\n						'+(null!=(s=n.lambda(null!=(s=null!=e?e.titles:e)?s.loading:s,e))?s:"")+"\n					</div>\n				</div>\n			</div>\n		</div>\n"},28:function(n,e,l,a,t,s,i){return'		<div class="blocksection-latestcount">\n			'+n.escapeExpression((l.enterModule||e&&e.enterModule||l.helperMissing).call(e,i[1],{name:"enterModule",hash:{},data:t}))+"\n		</div>\n"},30:function(n,e,l,a,t,s,i){return'		<div class="blocksection-status">\n			'+n.escapeExpression((l.enterModule||e&&e.enterModule||l.helperMissing).call(e,i[1],{name:"enterModule",hash:{},data:t}))+"\n		</div>\n"},32:function(n,e,l,a,t,s,i){var o;return'		<div class="blocksection-inners clearfix '+n.escapeExpression(n.lambda(null!=(o=null!=e?e.classes:e)?o["blocksection-inners"]:o,e))+'">\n'+(null!=(o=l.each.call(e,null!=(o=null!=e?e["settings-ids"]:e)?o["block-inners"]:o,{name:"each",hash:{},fn:n.program(33,t,0,s,i),inverse:n.noop,data:t}))?o:"")+"		</div>\n"},33:function(n,e,l,a,t,s,i){var o;return null!=(o=(l.withBlock||e&&e.withBlock||l.helperMissing).call(e,i[1],e,{name:"withBlock",hash:{},fn:n.program(34,t,0,s,i),inverse:n.noop,data:t}))?o:""},34:function(n,e,l,a,t,s,i){var o;return"					"+n.escapeExpression((l.enterModule||e&&e.enterModule||l.helperMissing).call(e,i[2],{name:"enterModule",hash:{items:null!=(o=null!=i[2]?i[2].bs:i[2])?o.dataset:o,itemDBKey:null!=(o=null!=(o=null!=i[2]?i[2].bs:i[2])?o["db-keys"]:o)?o["db-key"]:o},data:t}))+"\n"},36:function(n,e,l,a,t,s,i){return'		<div class="blocksection-fetchmore">\n			'+n.escapeExpression((l.enterModule||e&&e.enterModule||l.helperMissing).call(e,i[1],{name:"enterModule",hash:{},data:t}))+"\n		</div>\n"},38:function(n,e,l,a,t,s,i){var o;return'		<div class="blocksection-extensions clearfix '+n.escapeExpression(n.lambda(null!=(o=null!=e?e.classes:e)?o["blocksection-extensions"]:o,e))+'">\n'+(null!=(o=l.each.call(e,null!=(o=null!=e?e["template-ids"]:e)?o["block-extensions"]:o,{name:"each",hash:{},fn:n.program(39,t,0,s,i),inverse:n.noop,data:t}))?o:"")+"		</div>\n"},39:function(n,e,l,a,t,s,i){return"				"+n.escapeExpression((l.applyLightTemplate||e&&e.applyLightTemplate||l.helperMissing).call(e,e,{name:"applyLightTemplate",hash:{context:i[1]},data:t}))+"\n"},compiler:[7,">= 4.0.0"],main:function(n,e,l,a,t,s,i){var o,r,u=l.helperMissing,c="function",d=n.escapeExpression;return'<div class="'+d((r=null!=(r=l["class"]||(null!=e?e["class"]:e))?r:u,typeof r===c?r.call(e,{name:"class",hash:{},data:t}):r))+" "+d((r=null!=(r=l["runtime-class"]||(null!=e?e["runtime-class"]:e))?r:u,typeof r===c?r.call(e,{name:"runtime-class",hash:{},data:t}):r))+" "+(null!=(o=l["if"].call(e,null!=(o=null!=(o=null!=e?e.bs:e)?o.feedback:o)?o["stop-fetching"]:o,{name:"if",hash:{},fn:n.program(1,t,0,s,i),inverse:n.noop,data:t}))?o:"")+'" '+(null!=(o=(l.generateId||e&&e.generateId||u).call(e,{name:"generateId",hash:{addURL:"true"},fn:n.program(3,t,0,s,i),inverse:n.noop,data:t}))?o:"")+' data-settings-id="'+d((r=null!=(r=l["settings-id"]||(null!=e?e["settings-id"]:e))?r:u,typeof r===c?r.call(e,{name:"settings-id",hash:{},data:t}):r))+'" '+(null!=(o=l.each.call(e,null!=e?e.params:e,{name:"each",hash:{},fn:n.program(5,t,0,s,i),inverse:n.noop,data:t}))?o:"")+">\n\n"+(null!=(o=(l.withModule||e&&e.withModule||u).call(e,e,"controlgroup-top",{name:"withModule",hash:{},fn:n.program(7,t,0,s,i),inverse:n.noop,data:t}))?o:"")+"			\n"+(null!=(o=l["if"].call(e,null!=(o=null!=(o=null!=e?e.bs:e)?o.feedback:o)?o.title:o,{name:"if",hash:{},fn:n.program(9,t,0,s,i),inverse:n.noop,data:t}))?o:"")+"\n	"+(null!=(o=l["if"].call(e,null!=e?e["add-clearfixdiv"]:e,{name:"if",hash:{},fn:n.program(14,t,0,s,i),inverse:n.noop,data:t}))?o:"")+"\n	\n	"+(null!=(r=null!=(r=l["description-top"]||(null!=e?e["description-top"]:e))?r:u,o=typeof r===c?r.call(e,{name:"description-top",hash:{},data:t}):r)?o:"")+"\n\n"+(null!=(o=(l.withModule||e&&e.withModule||u).call(e,e,"controlgroup-bottom",{name:"withModule",hash:{},fn:n.program(16,t,0,s,i),inverse:n.noop,data:t}))?o:"")+"\n"+(null!=(o=(l.withModule||e&&e.withModule||u).call(e,e,"submenu",{name:"withModule",hash:{},fn:n.program(18,t,0,s,i),inverse:n.noop,data:t}))?o:"")+"\n"+(null!=(o=l["if"].call(e,null!=e?e["show-filter"]:e,{name:"if",hash:{},fn:n.program(20,t,0,s,i),inverse:n.noop,data:t}))?o:"")+"\n"+(null!=(o=l["if"].call(e,null!=e?e["messagefeedback-top"]:e,{name:"if",hash:{},fn:n.program(23,t,0,s,i),inverse:n.noop,data:t}))?o:"")+"\n"+(null!=(o=l["if"].call(e,null!=e?e["show-disabled-layer"]:e,{name:"if",hash:{},fn:n.program(26,t,0,s,i),inverse:n.noop,data:t}))?o:"")+(null!=(o=(l.withModule||e&&e.withModule||u).call(e,e,"latestcount",{name:"withModule",hash:{},fn:n.program(28,t,0,s,i),inverse:n.noop,data:t}))?o:"")+"\n"+(null!=(o=(l.withModule||e&&e.withModule||u).call(e,e,"status",{name:"withModule",hash:{},fn:n.program(30,t,0,s,i),inverse:n.noop,data:t}))?o:"")+"\n	"+(null!=(r=null!=(r=l.description||(null!=e?e.description:e))?r:u,o=typeof r===c?r.call(e,{name:"description",hash:{},data:t}):r)?o:"")+"\n\n"+(null!=(o=l["if"].call(e,null!=(o=null!=e?e["settings-ids"]:e)?o["block-inners"]:o,{name:"if",hash:{},fn:n.program(32,t,0,s,i),inverse:n.noop,data:t}))?o:"")+"\n"+(null!=(o=l["if"].call(e,null!=e?e["messagefeedback-bottom"]:e,{name:"if",hash:{},fn:n.program(23,t,0,s,i),inverse:n.noop,data:t}))?o:"")+"\n"+(null!=(o=(l.withModule||e&&e.withModule||u).call(e,e,"fetchmore",{name:"withModule",hash:{},fn:n.program(36,t,0,s,i),inverse:n.noop,data:t}))?o:"")+"\n	"+(null!=(o=l["if"].call(e,null!=e?e["add-clearfixdiv"]:e,{name:"if",hash:{},fn:n.program(14,t,0,s,i),inverse:n.noop,data:t}))?o:"")+"\n\n"+(null!=(o=l["if"].call(e,null!=(o=null!=e?e["template-ids"]:e)?o["block-extensions"]:o,{name:"if",hash:{},fn:n.program(38,t,0,s,i),inverse:n.noop,data:t}))?o:"")+"\n	"+(null!=(r=null!=(r=l["description-bottom"]||(null!=e?e["description-bottom"]:e))?r:u,o=typeof r===c?r.call(e,{name:"description-bottom",hash:{},data:t}):r)?o:"")+"\n</div>"},useData:!0,useDepths:!0})}();