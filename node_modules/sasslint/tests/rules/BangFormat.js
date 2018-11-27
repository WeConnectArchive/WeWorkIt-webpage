import test from 'tape-catch';
import '../assertions';

const { raw } = String;

test('BangFormat', function(t) {
    t.plan(9);

    const defaults = {
        'BangFormat': {
            enabled: true,
        }
    };

    t.isValid(defaults, 'p { color: #000; }', 'when no bang is used');
    t.isValid(defaults, 'p { color: #000 !important; }', 'when bang is used correctly');
    t.isInvalid(defaults, 'p { color: #000!important; }', 'when bang has no space before');
    t.isInvalid(defaults, 'p { color: #000 ! important; }', 'when bang has a space after');

    const strings = raw`
      p:before { content: "!important"; }
      p:before { content: "imp!ortant"; }
      p:after { content: '!'; }
      div:before { content: 'important!'; }
      div:after { content: '  !  '; }
      p[attr="foo!bar"] {};
      p[attr='foo!bar'] {};
      p[attr="!foobar"] {};
      p[attr='foobar!'] {};
      $foo: 'bar!';
      $foo: "bar!";
      $foo: "!bar";
      $foo: "b!ar";
    `;

    t.isValid(defaults, strings, 'when ! appears within a string');
    t.isValid(defaults, '.class { margin: 0 !important }', 'when !word is not followed by a semicolon');


    const allowSpaceAfter = {
        'BangFormat': {
            enabled: true,
            space_before_bang: true,
            space_after_bang: true,
        }
    };

    t.isValid(allowSpaceAfter, 'p { color: #000 ! important; }', 'when bang has a space after and config allows it');

    const noSpaceBefore = {
        'BangFormat': {
            enabled: true,
            space_before_bang: false,
            space_after_bang: false,
        }
    };

    t.isInvalid(noSpaceBefore, 'p { color: #000 !important; }', 'when bang has a space before but config does not allow it');

    const noSpaceBeforeButSpaceAfter = {
        'BangFormat': {
            enabled: true,
            space_before_bang: false,
            space_after_bang: true,
        }
    };

    t.isValid(noSpaceBeforeButSpaceAfter, 'p { color: #000! important; }', 'when bang has a space before and no space after');

});
