/**
 * Created by jaceil on 11/9/15.
 */

new Vue({
    el: '#test',

    ready: function() {
        this.fetchMessages();
    },

    methods: {
        fetchMessages: function() {
            this.$http.get('api/plates', function(plates) {
                this.$set('plates', plates);
            });
        }
    }
});