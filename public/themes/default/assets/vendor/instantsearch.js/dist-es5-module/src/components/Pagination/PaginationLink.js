'use strict';

Object.defineProperty(exports, "__esModule", {
  value: true
});

var _jsx = function () { var REACT_ELEMENT_TYPE = typeof Symbol === "function" && Symbol.for && Symbol.for("react.element") || 0xeac7; return function createRawReactElement(type, props, key, children) { var defaultProps = type && type.defaultProps; var childrenLength = arguments.length - 3; if (!props && childrenLength !== 0) { props = {}; } if (props && defaultProps) { for (var propName in defaultProps) { if (props[propName] === void 0) { props[propName] = defaultProps[propName]; } } } else if (!props) { props = defaultProps || {}; } if (childrenLength === 1) { props.children = children; } else if (childrenLength > 1) { var childArray = Array(childrenLength); for (var i = 0; i < childrenLength; i++) { childArray[i] = arguments[i + 3]; } props.children = childArray; } return { $$typeof: REACT_ELEMENT_TYPE, type: type, key: key === undefined ? null : '' + key, ref: null, props: props, _owner: null }; }; }();

var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _react = require('react');

var _react2 = _interopRequireDefault(_react);

var _isEqual = require('lodash/lang/isEqual');

var _isEqual2 = _interopRequireDefault(_isEqual);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var PaginationLink = function (_React$Component) {
  _inherits(PaginationLink, _React$Component);

  function PaginationLink() {
    _classCallCheck(this, PaginationLink);

    return _possibleConstructorReturn(this, Object.getPrototypeOf(PaginationLink).apply(this, arguments));
  }

  _createClass(PaginationLink, [{
    key: 'componentWillMount',
    value: function componentWillMount() {
      this.handleClick = this.handleClick.bind(this);
    }
  }, {
    key: 'shouldComponentUpdate',
    value: function shouldComponentUpdate(nextProps) {
      return !(0, _isEqual2.default)(this.props, nextProps);
    }
  }, {
    key: 'handleClick',
    value: function handleClick(e) {
      this.props.handleClick(this.props.pageNumber, e);
    }
  }, {
    key: 'render',
    value: function render() {
      var _props = this.props;
      var cssClasses = _props.cssClasses;
      var label = _props.label;
      var ariaLabel = _props.ariaLabel;
      var url = _props.url;
      var isDisabled = _props.isDisabled;


      var tagName = 'span';
      var attributes = {
        className: cssClasses.link,
        dangerouslySetInnerHTML: {
          __html: label
        }
      };

      // "Enable" the element, by making it a link
      if (!isDisabled) {
        tagName = 'a';
        attributes = _extends({}, attributes, {
          'aria-label': ariaLabel,
          'href': url,
          'onClick': this.handleClick
        });
      }

      var element = _react2.default.createElement(tagName, attributes);

      return _jsx('li', {
        className: cssClasses.item
      }, void 0, element);
    }
  }]);

  return PaginationLink;
}(_react2.default.Component);

exports.default = PaginationLink;