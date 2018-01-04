Ext.define('Alegra.controller.Contacts', {
  extend: 'Ext.app.Controller',
  stores: ['Contacts'],
  models: ['Contact'],
  views: ['contact.Form', 'contact.Grid', 'contact.Show'],
  refs: [{
    ref: 'contactPanel',
    selector: 'panel',
  }, {
    ref: 'contactGrid',
    selector: 'grid',
  }],
  init: function() {
    this.control({
      'contactGrid dataview': {
        itemdblclick: this.editContact,
      },
      'contactGrid button[action=add]': {
        click: this.editContact,
      },
      'contactForm button[action=save]': {
        click: this.insertOrEditContact,
      },
    });
  },
  editContact(grid, record) {
    let editar = Ext.create('Alegra.view.contact.Form').show();
    if (record.stores != null) {
      editar.down('form').loadRecord(record);
    }
  },
  insertOrEditContact(button) {
    let win = button.up('window');
    let form = win.down('form');
    let record = form.getRecord();
    let values = form.getValues();
    let add = false;
    let msg = 'Contacto ha sido actualizado correctamente';

    if (values.id > 0) {
      record.set(values);
    } else {
      record = Ext.create('Alegra.model.Contact');
      record.set(values);
      this.getContactsStore().add(record);
      add = true;
      msg = 'Contacto ha sido creado correctamente';
    }

    let myMask = new Ext.LoadMask(Ext.getBody(), {
      msg: "Espere..."
    });
    myMask.show();
    this.getContactsStore().sync({
      success: function(batch, action) {
        myMask.hide();
        if (add) {
          this.getContactsStore().load();
        }
        let reader = batch.proxy.getReader();
        Ext.Msg.alert('Success', msg);
        win.close();
      },
      failure: function(batch, action) {
        myMask.hide();
        let reader = batch.proxy.getReader();
        Ext.Msg.alert('Failed', reader.jsonData ? reader.jsonData.message : 'No response');
      },
      scope: this,
    });
  },
});
