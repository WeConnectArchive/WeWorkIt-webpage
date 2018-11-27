import Linter from './Linter';
import includes from 'lodash/collection/includes';

const STOPPING_CHARACTERS = ['!', '\'', '"'];

/**
 * @class BangFormat
 *
 * Check spacing of ! declarations, like !important and !default
 */
class BangFormat extends Linter {

    /**
     * Types of nodes that this linter is interested in.
     * @see https://github.com/DFurnes/sasstree/tree/master/src/Nodes
     * @type {Array}
     */
    nodeTypes = ['Declaration'];

    /**
     * Default options.
     * @type {object}
     */
    defaults = {
        severity: 'warning',
        space_before_bang: true,
        space_after_bang: false
    };

    run(node) {
        const offset = BangFormat.findBangOffset(node);
        if(node.value[offset] !== '!') return;

        this.checkBeforeBang(node, offset);
        this.checkAfterBang(node, offset);
    }

    checkBeforeBang(node, offset) {
        const expected = this.options.space_before_bang ? / / : /[^ ]/;

        const charBeforeBang = node.value[offset - 1];

        //console.log('b char: "' + charBeforeBang + '"... should be a space? "' + this.options.space_before_bang + '".');
        if(!charBeforeBang.match(expected)) {
            this.error(node, `! ${this.options.space_before_bang ? 'should': 'should not'} be preceded by a space.`);
        }
    }

    checkAfterBang(node, offset) {
        const expected = this.options.space_after_bang ? / / : /[^ ]/;

        const charAfterBang = node.value[offset + 1];

        //console.log('a char: "' + charAfterBang + '"... should be a space? "' + this.options.space_after_bang + '".');
        if(!charAfterBang.match(expected)) {
            this.error(node, `! ${this.options.space_after_bang ? 'should': 'should not'} be followed by a space.`);
        }
    }

    static findBangOffset(node) {
        let offset = node.value.length;

        do {
            offset--;
        } while (!includes(STOPPING_CHARACTERS, node.value[offset]) && offset > 0);

        return offset;
    }
}

export default BangFormat;
