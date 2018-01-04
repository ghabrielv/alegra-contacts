Ext.define('Alegra.store.Contacts', {
  extend: 'Ext.data.Store',
  model: 'Alegra.model.Contact',
  autoLoad: true,
  proxy: {
    type: 'ajax',
    api: {
      create: 'contact/create',
      read: 'contact/index',
      update: 'contact/edit',
    },
    actionMethods: {
      create: 'POST',
      read: 'GET',
      update: 'POST',
    },
    reader: {
      type: 'json',
      root: 'data',
      successProperty: 'success',
    },
    writer: {
      type: 'json',
      writeAllFields: true,
      encode: true,
      root: 'data',
    },
  },
});
