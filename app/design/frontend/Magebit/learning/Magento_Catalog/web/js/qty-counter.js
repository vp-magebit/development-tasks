/**
 * This file is part of the Magebit_Learning package.
 * DISCLAIMER
 * Do not edit or add to this file if you wish to upgrade Magebit_Learning
 * to newer versions in the future.
 *
 * @copyright Copyright (c) 2022 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

'use strict';

define([
    'ko',
    'uiComponent'
], function (ko, Component) {
    'use strict';
    return Component.extend({
        initialize: function () {
            this._super();
            this.qty = ko.observable(this.defaultQty);
        },
        minusQty: function () {
            let newQty = this.qty() - 1;
            if (newQty < 1) {
                newQty = 1;
            }
            this.qty(newQty);
        },
        plusQty: function () {
            let newQty = this.qty() + 1;
            this.qty(newQty);
        }
    });
});
