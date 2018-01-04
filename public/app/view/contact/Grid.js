let sm = Ext.create('Ext.selection.CheckboxModel');
Ext.define('Alegra.view.contact.Grid', {
  extend: 'Ext.grid.Panel',
  alias: 'widget.contactGrid',
  requires: ['Ext.toolbar.Paging'],
  iconCls: 'icon-user',
  title: 'Contactos',
  selModel: sm,
  store: 'Contacts',
  stripeRows: true,
  columnLines: true,
  id: 'contactGrid',
  columns: [{
    header: 'Nombre',
    width: 299,
    flex: 1,
    dataIndex: 'name',
    align: 'center',
    menuDisabled: true,
  }, {
    header: 'Identificación',
    width: 177,
    flex: 1,
    dataIndex: 'identification',
    align: 'center',
    menuDisabled: true,
  }, {
    header: 'Teléfono',
    width: 177,
    flex: 1,
    dataIndex: 'phonePrimary',
    align: 'center',
    menuDisabled: true,
  }, {
    header: 'Observaciones',
    width: 177,
    flex: 1,
    dataIndex: 'observations',
    align: 'center',
    menuDisabled: true,
  }, {
    xtype: 'actioncolumn',
    width: 50,
    text: 'Acciones',
    align: 'center',
    flex: 1,
    menuDisabled: true,
    items: [{
      icon: 'https://cdn1.alegra.com/images/icons/zoom.png',
      tooltip: 'Visualizar',
      handler: function(grid, rowIndex, colIndex, item, e, record, row) {
        var rec = grid.getStore().getAt(rowIndex);
        let formShow = Ext.create('Alegra.view.contact.Show').show();
        formShow.down('form').loadRecord(rec);
      },
    }, {
      icon: 'https://cdn1.alegra.com/images/icons/page_edit.png',
      tooltip: 'Editar',
      handler: function(grid, rowIndex, colIndex) {
        var rec = grid.getStore().getAt(rowIndex);
        let formEdit = Ext.create('Alegra.view.contact.Form').show();
        if (rec.stores != null) {
          formEdit.down('form').loadRecord(rec);
        }
      },
    }, ],
  }],
  initComponent: function() {
    this.dockedItems = [{
      xtype: 'toolbar',
      items: [{
        iconCls: 'icon-save',
        text: 'Nuevo',
        action: 'add',
      }, ],
    }, {
      xtype: 'pagingtoolbar',
      dock: 'top',
      store: 'Contacts',
      displayInfo: true,
      displayMsg: 'Mostrando Contactos {0} - {1} de {2}',
      emptyMsg: "Ningún contacto encontrado.",
    }];
    this.callParent(arguments);
  }
});
