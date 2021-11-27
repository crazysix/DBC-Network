(function ($, Drupal, drupalSettings) {
  Drupal.behaviors.SubstrateAddressBehavior = {
    attach: function (context, settings) {
      var accounts = drupalSettings.substrate_address.substrate_addresses.accounts;

      $(document, context).once('get-web3-addresses').each(function() {
        dappex.web3Enable().then(function(){
          if (dappex.isWeb3Injected) {
            dappex.web3Accounts().then(async(ext_accounts) => {
              var new_accounts = [];
              $(ext_accounts).each(function(index) {
                if (!$.inArray($(this).address, accounts)) {
                  new_accounts.push($(this).address);
                }
              });
              if (new_accounts.length > 0) {
                addWebThreeAccounts(new_accounts);
              }
            });
          }
        });
      });

      var addWebThreeAccounts = function (addresses) {
        $.get(
          '/user/add-substrate-address',
          {addresses: JSON.stringify(addresses)},
          function(markup) {
            $('.substrate-addresses-wrapper').append(markup);
          },
          'html'
        );
        accounts = $.merge(accounts, addresses);
      };
    }
  };

})(jQuery, Drupal, drupalSettings);
