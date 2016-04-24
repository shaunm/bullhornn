/**
 * LoginController
 * @namespace thinkster.authentication.controllers
 */
(function () {
    'use static';

    angular
        .module('thinkster.authentication.controllers')
        .controller('LoginController', ['$location', '$scope', 'Authentication', LoginController]);

    /**
     * @namespace LoginController
     */
    function LoginController($location, $scope, Authentication) {

        /**
         * @name login
         * @desc Log the user in
         * @memberOf thinkster.authentication.controllers.LoginController
         */
        this.login = function() {
            var p = Authentication.login(this.email, this.password);
            p.then(function(value) {
                if (value.status < 200 || value.status >299) {
                    $scope.error = value.data.message;
                }
            }, function(reason) {
                console.log("Error: " + JSON.stringify(reason));
            });
        }
    }
})();
