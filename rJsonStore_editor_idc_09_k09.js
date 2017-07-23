function test(){

Ext.QuickTips.init();


// setting up the save and change rejection handlers
var onSave = function() {
	var modified = rJstore.getModifiedRecords();

	if (modified.length > 0) {
		var recordsToSend = [];
		Ext.each(modified, function(record){
			recordsToSend.push(record.data);
		}); 
	
		var grid = Ext.getCmp('iEditorGrid');
		grid.el.mask('Updating', 'x-mask-loading');
		grid.stopEditing();

		recordsToSend = Ext.encode(recordsToSend);

		Ext.Ajax.request({
			//url:	'tsEj/successTrue.js',
			url:	'djson/idc_09_k09_occupation_servercabinet_dataUpdate.php',
			params:	{
				debug:	'0',
				callback:	'0',
				recordsToInsertUpdate:	recordsToSend
				
			},
			success:	function(response) {
				grid.el.unmask();
				rJstore.commitChanges();

				//var result = Ext.decode(response.responseText);
			}
		});

	}
};
var onRejectChanges = function() {
	rJstore.rejectChanges();
};

// creating combobox and numberfield editors
var textFieldEditor = new Ext.form.TextField();

var comboEditor = {
	xtype:		'combo',
	triggerAction:	'all',
	displayField:	'status',
	valueField:	'status',
	store:		{
		xtype:	'jsonstore',
		root:	'root',
		fields:	['state'],
		proxy:	new Ext.data.ScriptTagProxy({
			url:	'djson/getStatus.php'
		})
	}
};

var numberFieldEditor = {
	xtype:		'numberfield',
	minLength:	5,
	maxLength:	5
};

// creating two custom renderers
var colorTextBlue = function(id) {
	return '<span style="color: #0000FF;">' + id + '</span>';
};

var cm = new Ext.grid.ColumnModel([new Ext.grid.RowNumberer(), 

	{  
		header:"U位 idc_09_k09",
		dataIndex:'001-A1-location',
		sortable:	true,
		resizeable:	true,
		//hidden:		true,
		renderer:	colorTextBlue		
	},{
		header:'主机',
		dataIndex:'001-A1',
		editor:	textFieldEditor		
	},{ 
		header:"台帐",
		dataIndex:'001-A1-tag',
		editor:	textFieldEditor
		
	},{
		header:'迁入',
		dataIndex:'001-A1-in_pose_date',
		editor:	textFieldEditor
		
	},{
		header:'U态',
		dataIndex:'001-A1-uidle',
		editor:	textFieldEditor		
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
		},[{name:'001-A1'},{name:'002-A2'}]
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
var recordFields = [
	'001-A1-location',
	'001-A1',
	'001-A1-tag',
	'001-A1-in_pose_date',
	'001-A1-uidle'
];

var remoteProxy = new Ext.data.ScriptTagProxy({
	url:	'djson/idc_07_occupation_servercabinet.php?start=&limit='
});
var remoteProxy2 = new Ext.data.HttpProxy({
	//url : 'djson/idc_07_occupation_servercabinet_single_flat.php'
	api:	{
		read:	'djson/idc_09_k09_occupation_servercabinet_single_flat.php',
		update:	'djson/idc_09_k09_occupation_servercabinet_dataUpdate.php'
	}
});

var writer = new Ext.data.JsonWriter({
	writeAllFields:	true
});
var rJstore = new Ext.data.JsonStore({
	proxy:		remoteProxy2,
	storeId:	'iRemoteStore',
	fields:		recordFields,

	totalProperty:	'results',
	root:		'root',
	id:		'iRStore',
	autoLoad:	false,
	remoteSort:	true,
	idProperty:	'location',
	autoSave:	false,
	successProperty:	'success',
	writer:		writer,
	listeners:	{
		exception:	function() {
			console.info(arguments);
		}
	}

});

//store.load();

// configuring the advanced gridpanel
var pagingToolbar = {
	xtype:	'paging',
	store:	rJstore,
	pageSize:	20,
	displayInfo:	true,
	items:	[
		'-',
		{
		 text:	'Save Changes',
		 handler:	onSave
		},
		'-',
		{
		 text:	'Reject Changes',
		 handler:	onRejectChanges
		},
		'-'
	]
};


var grid1 = new Ext.grid.EditorGridPanel({
	xtype:	'grid',
	//xtype:		'editorgrid',
	title: 'Server Cabinet - [机柜信息库设计]',
	cm : cm,
	id:	'iEditorGrid',		
	store : rJstore,
	autoExpandColumn : 'pipeInfoName',
	border : false,
	stripeRows : 	true,//斑马线效果
	loadMask:	true,
	height:		450,	
	viewConfig: 	{forceFit:true},
	enableColumnHide : false,
    	enableColumnMove : false,
    	enableColumnResize : false,
	//baseCls: 'x-grid3-row',
	//cls: 'rowspan-grid',
	//appleTo: 'grid_div',
	bbar:	pagingToolbar,
	//listeners:	{
	//	rowdblclick:	doRowDblClick,
	//	rowcontextmenu:	doRowCtxMenu
	//},
	clicksToEdit:	1,
});


//alert(grid1);
//store.on("load",function(){gridSpan(grid1,"row","[wd],[topic],[target],[measure],[plan]");});
//store.on("load",function(){gridSpan(grid1,"row","[location],[hostname],[tag]");});
//rJstore.on("load",function(){gridSpan(grid1,"row","[001-A1],[002-A2]");});
rJstore.on("load",function(){gridSpan(grid1,"row","[001-A1],[001-A1-tag],[001-A1-in_pose_date]");});


new Ext.Window({

	height: 550,
	width:	750,
	border:	false,
	layout:	'fit',
	items:	grid1
}).show();
Ext.StoreMgr.get('iRStore').load({
	params:	{
		start:	0,
		limit:	45
	}
});

/*
var view = new Ext.Viewport({
	id: 'view_servercabinet',
	layout: 'fit',		
	items: grid1
});
*/

/*
var view = grid1.getView();
var rows = view.getRows();
//alert(,view.getRows().length);

 for (i = 0; i < rows.length ; i++){
   var cls = Ext.get(rows[i]).dom;
   cls.style.borderBottomWidth = "0";
   //cls.removeClass('x-grid3-row');
   //cls.addClass('rowspan-grid');

 }
*/






}
Ext.onReady(test);


