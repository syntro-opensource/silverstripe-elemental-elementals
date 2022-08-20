<?php
namespace Syntro\SilverstripeElementalElementals\Middleware;

use SilverStripe\Control\Middleware\HTTPMiddleware;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Control\HTTPResponse;
use Syntro\SilverstripeElementalElementals\BootstrapConfig;

/**
 * Wraps <table> tags in a table-responsive div.
 * @author Matthias Leutenegger
 */
class BootstrapTableMiddleware implements HTTPMiddleware
{

    /**
     * process - does the wrapping if configured
     *
     * @param  HTTPRequest $request  the initial request
     * @param  callable    $delegate the delegate function
     * @return HTTPResponse
     */
    public function process(HTTPRequest $request, callable $delegate)
    {
        $response = $delegate($request);

        if ($request->routeParams()['Controller'] != 'SilverStripe\Admin\AdminRootController'
            && $request->routeParams()['Controller'] != '%$SilverStripe\GraphQL\Controller.admin'
            && strpos(strtolower($response->getHeader('content-type')), 'text/html') !== false
            && BootstrapConfig::addResponsiveTables()
        ) {
            $body = $response->getBody();
            $body = str_replace('<table', '<div class="table-responsive"><table', $body ?: '');
            $body = str_replace('</table>', '</table></div>', $body ?: '');
            $response->setBody($body);
        }

        return $response;
    }
}
