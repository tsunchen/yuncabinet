




<html>
  <head>
    <title>K列云机柜——信息库设计2017</title>
    
	<link rel="stylesheet" type="text/css" href="../extjs/ext-3.4/resources/css/ext-all.css"/>
	<script type="text/javascript" src="../extjs/ext-3.4/adapter/ext/ext-base.js"></script>
	<script type="text/javascript" src="../extjs/ext-3.4/ext-all-debug.js"></script>
	<script type="text/javascript" src="../extjs/ext-3.4/src/locale/ext-lang-zh_CN.js"></script>

	<link rel="stylesheet" type="text/css" href="css/RowSpanView_0.css"/>
	<script type="text/javascript" src="tsEj/rowspanview.js"></script>
  </head>


<script type="text/javascript">
Ext.onReady(function(){ 

Ext.QuickTips.init();

// creating two custom renderers
var colorTextBlue = function(id) {
	return '<span style="color: #0000FF;">' + id + '</span>';
};

var cm = new Ext.grid.ColumnModel([new Ext.grid.RowNumberer(), 

	{  
		header:"U位",
		dataIndex:'idc09-location'
		
	},{
		header:'台帐',
		dataIndex:'idc09-tag',
		renderer:	colorTextBlue		
	},{ 
		header:"设备",
		dataIndex:'idc09'
/*			
	//},{
	//	header:'004-A4 SHARE',
	//	dataIndex:'004-A4',
	//	renderer:	colorTextBlue
	//},{
	//	header:'005-A5',
	//	dataIndex:'005-A5'
	},{
		header:'006-A6 SHARE',
		dataIndex:'006-A6',
		renderer:	colorTextBlue	
	},{
		header:'007-A7 SHARE',
		dataIndex:'007-A7',
		renderer:	colorTextBlue
	},{
		header:'008-A8 SHARE',
		dataIndex:'008-A8',
		renderer:	colorTextBlue
	},{
		header:'009-A9',
		dataIndex:'009-A9'
	},{
		header:'010-A10',
		dataIndex:'010-A10'
	},{
		header:'011-A11',
		dataIndex:'011-A11'
	},{
		header:'012-A12',
		dataIndex:'012-A12'
*/
	}
]);



//数据源定义
/*
var store = new Ext.data.Store({
	proxy : new Ext.data.HttpProxy({url : 'djson/idc_07_occupation_servercabinet.php?start=&limit='}),//查看地址，获取JSON地址信息
	reader : new Ext.data.JsonReader({							
		totalProperty : 'totalProperty',//总页数
		root : 'root'//数据 
		//},[{name:'wd'},{name:'topic'},{name:'target'},{name:'measure'},{name:'plan'}]
		//},[{name:'Location_U'},{name:'A1'},{name:'A2'}]
		},[	{name:'001-A1'},{name:'002-A2'},{name:'003-A3'},{name:'004-A4'},
			{name:'005-A5'},{name:'006-A6'},{name:'007-A7'},{name:'008-A8'}
		]
	)
});
*/
/*
var store = new Ext.data.Store({
	proxy : new Ext.data.HttpProxy({url : 'djson/servercabinet2.txt'}),//查看地址，获取JSON地址信息
	reader : new Ext.data.JsonReader({							
		totalProperty : 'totalProperty',//总页数
		root : 'root'//数据 
		//},[{name:'wd'},{name:'topic'},{name:'target'},{name:'measure'},{name:'plan'}]
		//},[{name:'location'},{name:'hostname'},{name:'tag'}]
		},[{name:'hostname'},{name:'tag'}]
	)
});
*/
//store.load();

// configuring the advanced gridpanel
var pagingToolbar = {
	xtype:	'paging',
	store:	store,
	pageSize:	24,
	displayInfo:	true
};

var recordFields = [
	'idc09-location', 'idc09-tag', 'idc09'
	//'001-A1', '002-A2', '003-A3', '004-A4',
	//'005-A5', '006-A6', '007-A7', '008-A8',
	//'009-A9', '010-A10', '011-A11', '012-A12'
];
var store = new Ext.data.JsonStore({
	fields:		recordFields,
	url:		'djson/idc_09_occupation_servercabinet_columns_k.php?start=&limit=2000',
	totalProperty:	'totalProperty',
	root:		'root',
	id:		'iRStore',
	autoLoad:	false,
	remoteSort:	true

});
store.load();


var grid1 = new Ext.grid.GridPanel({
	title: 'Server Cabinet - [机柜信息库设计]',
	cm : cm,		
	store : store,
	autoExpandColumn : 'pipeInfoName',
	border : false,
	stripeRows : true,//斑马线效果
	loadMask:true,
	height:450,	
	viewConfig: {forceFit:true},
	enableColumnHide : false,
    	enableColumnMove : false,
    	enableColumnResize : false,
	//baseCls: 'x-grid3-row',
	//cls: 'rowspan-grid',
	//appleTo: 'grid_div',
	//bbar:	pagingToolbar,
});


//alert(grid1);
//store.on("load",function(){gridSpan(grid1,"row","[wd],[topic],[target],[measure],[plan]");});
//store.on("load",function(){gridSpan(grid1,"row","[location],[hostname],[tag]");});
//"[001-A1],[002-A2],[003-A3],[004-A4],[005-A5],[006-A6],[007-A7],[008-A8],[009-A9],[010-A10],[011-A11],[012-A12]");
store.on("load",function(){gridSpan(grid1,"row",
"[idc09-location],[idc09-tag],[idc09]");
});



var view = new Ext.Viewport({
	id: 'view_servercabinet',
	layout: 'fit',		
	items: grid1
});


/*
new Ext.Window({

	height: 650,
	width:	750,
	border:	false,
	//layout:	{type: 'hbox'},
	items:	grid1,
	autoScroll:true,
        bodyStyle:'overflow-y:auto;overflow-x:auto;',
	viewConfig: {forceFit:true},
}).show();
Ext.StoreMgr.get('iRStore').load({
	params:	{
		start:	"",
		limit:	""
	}
});
*/








});


</script>

<body>
<div id='grid_div'></div>
</body>
</html>