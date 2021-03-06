'use strict';

Object.defineProperty(exports, "__esModule", {
  value: true
});

var _jsx = function () { var REACT_ELEMENT_TYPE = typeof Symbol === "function" && Symbol.for && Symbol.for("react.element") || 0xeac7; return function createRawReactElement(type, props, key, children) { var defaultProps = type && type.defaultProps; var childrenLength = arguments.length - 3; if (!props && childrenLength !== 0) { props = {}; } if (props && defaultProps) { for (var propName in defaultProps) { if (props[propName] === void 0) { props[propName] = defaultProps[propName]; } } } else if (!props) { props = defaultProps || {}; } if (childrenLength === 1) { props.children = children; } else if (childrenLength > 1) { var childArray = Array(childrenLength); for (var i = 0; i < childrenLength; i++) { childArray[i] = arguments[i + 3]; } props.children = childArray; } return { $$typeof: REACT_ELEMENT_TYPE, type: type, key: key === undefined ? null : '' + key, ref: null, props: props, _owner: null }; }; }();

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _react = require('react');

var _react2 = _interopRequireDefault(_react);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var PriceRangesForm = function (_React$Component) {
  _inherits(PriceRangesForm, _React$Component);

  function PriceRangesForm(props) {
    _classCallCheck(this, PriceRangesForm);

    var _this = _possibleConstructorReturn(this, Object.getPrototypeOf(PriceRangesForm).call(this, props));

    _this.state = {
      from: props.currentRefinement.from,
      to: props.currentRefinement.to
    };
    return _this;
  }

  _createClass(PriceRangesForm, [{
    key: 'componentWillMount',
    value: function componentWillMount() {
      this.handleSubmit = this.handleSubmit.bind(this);
    }
  }, {
    key: 'componentWillReceiveProps',
    value: function componentWillReceiveProps(props) {
      this.setState({
        from: props.currentRefinement.from,
        to: props.currentRefinement.to
      });
    }
  }, {
    key: 'getInput',
    value: function getInput(type) {
      var _this2 = this;

      return _jsx('label', {
        className: this.props.cssClasses.label
      }, void 0, _jsx('span', {
        className: this.props.cssClasses.currency
      }, void 0, this.props.labels.currency, ' '), _react2.default.createElement('input', {
        className: this.props.cssClasses.input,
        onChange: function onChange(e) {
          return _this2.setState(_defineProperty({}, type, e.target.value));
        },
        ref: type,
        type: 'number',
        value: this.state[type]
      }));
    }
  }, {
    key: 'handleSubmit',
    value: function handleSubmit(event) {
      var from = this.refs.from.value !== '' ? parseInt(this.refs.from.value, 10) : undefined;
      var to = this.refs.to.value !== '' ? parseInt(this.refs.to.value, 10) : undefined;
      this.props.refine(from, to, event);
    }
  }, {
    key: 'render',
    value: function render() {
      var fromInput = this.getInput('from');
      var toInput = this.getInput('to');
      var onSubmit = this.handleSubmit;
      return _react2.default.createElement(
        'form',
        { className: this.props.cssClasses.form, onSubmit: onSubmit, ref: 'form' },
        fromInput,
        _jsx('span', {
          className: this.props.cssClasses.separator
        }, void 0, ' ', this.props.labels.separator, ' '),
        toInput,
        _jsx('button', {
          className: this.props.cssClasses.button,
          type: 'submit'
        }, void 0, this.props.labels.button)
      );
    }
  }]);

  return PriceRangesForm;
}(_react2.default.Component);

PriceRangesForm.defaultProps = {
  cssClasses: {},
  labels: {}
};

exports.default = PriceRangesForm;