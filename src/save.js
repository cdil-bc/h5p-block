/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-block-editor/#useBlockProps
 */
import { useBlockProps, PlainText } from '@wordpress/block-editor';

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#save
 *
 * @return {WPElement} Element to render.
 */

export default function save(props) {
  const { attributes } = props;
  const { url } = attributes;
  return (
    <div {...useBlockProps.save()}>
      <iframe 
        src={url + '/embed'} 
        aria-label="Embed from H5P" 
        width="1088" 
        height="637" 
        frameborder="0" 
        allowfullscreen="allowfullscreen" 
        allow="autoplay *; geolocation *; microphone *; camera *; midi *; encrypted-media *">
      </iframe>
      
    </div>
  );
}

