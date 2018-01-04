Ext.define('Alegra.model.Contact', {
  extend: 'Ext.data.Model',
  fields: [
    'id',
    'name',
    'identification',
    'email',
    'phonePrimary',
    'phoneSecondary',
    'fax',
    'mobile',
    'observations',
    'priceList',
    'seller',
    'term',
    {
      name: 'address',
      mapping: 'address.address'
    },
    {
      name: 'city',
      mapping: 'address.city'
    },
    'type',
    'internalContacts',
  ],
});
