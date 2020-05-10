
window.projectVersion = 'master';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:Gricob" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Gricob.html">Gricob</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Gricob_FunctionalTestBundle" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Gricob/FunctionalTestBundle.html">FunctionalTestBundle</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Gricob_FunctionalTestBundle_Concerns" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Gricob/FunctionalTestBundle/Concerns.html">Concerns</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Gricob_FunctionalTestBundle_Concerns_CreatesObjects" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Gricob/FunctionalTestBundle/Concerns/CreatesObjects.html">CreatesObjects</a>                    </div>                </li>                            <li data-name="class:Gricob_FunctionalTestBundle_Concerns_InteractsWithConsole" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Gricob/FunctionalTestBundle/Concerns/InteractsWithConsole.html">InteractsWithConsole</a>                    </div>                </li>                            <li data-name="class:Gricob_FunctionalTestBundle_Concerns_InteractsWithDatabase" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Gricob/FunctionalTestBundle/Concerns/InteractsWithDatabase.html">InteractsWithDatabase</a>                    </div>                </li>                            <li data-name="class:Gricob_FunctionalTestBundle_Concerns_MakesHttpRequests" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html">MakesHttpRequests</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Gricob_FunctionalTestBundle_Constraints" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Gricob/FunctionalTestBundle/Constraints.html">Constraints</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Gricob_FunctionalTestBundle_Constraints_HasInDatabase" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Gricob/FunctionalTestBundle/Constraints/HasInDatabase.html">HasInDatabase</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Gricob_FunctionalTestBundle_DependencyInjection" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Gricob/FunctionalTestBundle/DependencyInjection.html">DependencyInjection</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Gricob_FunctionalTestBundle_DependencyInjection_Compiler" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Gricob/FunctionalTestBundle/DependencyInjection/Compiler.html">Compiler</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Gricob_FunctionalTestBundle_DependencyInjection_Compiler_PreventRemoveUnusedDefinitions" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Gricob/FunctionalTestBundle/DependencyInjection/Compiler/PreventRemoveUnusedDefinitions.html">PreventRemoveUnusedDefinitions</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:Gricob_FunctionalTestBundle_DependencyInjection_Configuration" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Gricob/FunctionalTestBundle/DependencyInjection/Configuration.html">Configuration</a>                    </div>                </li>                            <li data-name="class:Gricob_FunctionalTestBundle_DependencyInjection_FunctionalTestExtension" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Gricob/FunctionalTestBundle/DependencyInjection/FunctionalTestExtension.html">FunctionalTestExtension</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Gricob_FunctionalTestBundle_Enums" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Gricob/FunctionalTestBundle/Enums.html">Enums</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Gricob_FunctionalTestBundle_Enums_Enum" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Gricob/FunctionalTestBundle/Enums/Enum.html">Enum</a>                    </div>                </li>                            <li data-name="class:Gricob_FunctionalTestBundle_Enums_VerbosityLevel" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Gricob/FunctionalTestBundle/Enums/VerbosityLevel.html">VerbosityLevel</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Gricob_FunctionalTestBundle_Testing" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Gricob/FunctionalTestBundle/Testing.html">Testing</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Gricob_FunctionalTestBundle_Testing_CommandResult" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Gricob/FunctionalTestBundle/Testing/CommandResult.html">CommandResult</a>                    </div>                </li>                            <li data-name="class:Gricob_FunctionalTestBundle_Testing_FunctionalTestCase" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Gricob/FunctionalTestBundle/Testing/FunctionalTestCase.html">FunctionalTestCase</a>                    </div>                </li>                            <li data-name="class:Gricob_FunctionalTestBundle_Testing_RefreshDatabase" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Gricob/FunctionalTestBundle/Testing/RefreshDatabase.html">RefreshDatabase</a>                    </div>                </li>                            <li data-name="class:Gricob_FunctionalTestBundle_Testing_TestResponse" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Gricob/FunctionalTestBundle/Testing/TestResponse.html">TestResponse</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:Gricob_FunctionalTestBundle_FunctionalTestBundle" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Gricob/FunctionalTestBundle/FunctionalTestBundle.html">FunctionalTestBundle</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "Gricob.html", "name": "Gricob", "doc": "Namespace Gricob"},{"type": "Namespace", "link": "Gricob/FunctionalTestBundle.html", "name": "Gricob\\FunctionalTestBundle", "doc": "Namespace Gricob\\FunctionalTestBundle"},{"type": "Namespace", "link": "Gricob/FunctionalTestBundle/Concerns.html", "name": "Gricob\\FunctionalTestBundle\\Concerns", "doc": "Namespace Gricob\\FunctionalTestBundle\\Concerns"},{"type": "Namespace", "link": "Gricob/FunctionalTestBundle/Constraints.html", "name": "Gricob\\FunctionalTestBundle\\Constraints", "doc": "Namespace Gricob\\FunctionalTestBundle\\Constraints"},{"type": "Namespace", "link": "Gricob/FunctionalTestBundle/DependencyInjection.html", "name": "Gricob\\FunctionalTestBundle\\DependencyInjection", "doc": "Namespace Gricob\\FunctionalTestBundle\\DependencyInjection"},{"type": "Namespace", "link": "Gricob/FunctionalTestBundle/DependencyInjection/Compiler.html", "name": "Gricob\\FunctionalTestBundle\\DependencyInjection\\Compiler", "doc": "Namespace Gricob\\FunctionalTestBundle\\DependencyInjection\\Compiler"},{"type": "Namespace", "link": "Gricob/FunctionalTestBundle/Enums.html", "name": "Gricob\\FunctionalTestBundle\\Enums", "doc": "Namespace Gricob\\FunctionalTestBundle\\Enums"},{"type": "Namespace", "link": "Gricob/FunctionalTestBundle/Testing.html", "name": "Gricob\\FunctionalTestBundle\\Testing", "doc": "Namespace Gricob\\FunctionalTestBundle\\Testing"},
            
            {"type": "Trait", "fromName": "Gricob\\FunctionalTestBundle\\Concerns", "fromLink": "Gricob/FunctionalTestBundle/Concerns.html", "link": "Gricob/FunctionalTestBundle/Concerns/CreatesObjects.html", "name": "Gricob\\FunctionalTestBundle\\Concerns\\CreatesObjects", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\CreatesObjects", "fromLink": "Gricob/FunctionalTestBundle/Concerns/CreatesObjects.html", "link": "Gricob/FunctionalTestBundle/Concerns/CreatesObjects.html#method_setUpCreatesObjects", "name": "Gricob\\FunctionalTestBundle\\Concerns\\CreatesObjects::setUpCreatesObjects", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\CreatesObjects", "fromLink": "Gricob/FunctionalTestBundle/Concerns/CreatesObjects.html", "link": "Gricob/FunctionalTestBundle/Concerns/CreatesObjects.html#method_instance", "name": "Gricob\\FunctionalTestBundle\\Concerns\\CreatesObjects::instance", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\CreatesObjects", "fromLink": "Gricob/FunctionalTestBundle/Concerns/CreatesObjects.html", "link": "Gricob/FunctionalTestBundle/Concerns/CreatesObjects.html#method_create", "name": "Gricob\\FunctionalTestBundle\\Concerns\\CreatesObjects::create", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\CreatesObjects", "fromLink": "Gricob/FunctionalTestBundle/Concerns/CreatesObjects.html", "link": "Gricob/FunctionalTestBundle/Concerns/CreatesObjects.html#method_seed", "name": "Gricob\\FunctionalTestBundle\\Concerns\\CreatesObjects::seed", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\CreatesObjects", "fromLink": "Gricob/FunctionalTestBundle/Concerns/CreatesObjects.html", "link": "Gricob/FunctionalTestBundle/Concerns/CreatesObjects.html#method_getContainer", "name": "Gricob\\FunctionalTestBundle\\Concerns\\CreatesObjects::getContainer", "doc": "&quot;&quot;"},
            
            {"type": "Trait", "fromName": "Gricob\\FunctionalTestBundle\\Concerns", "fromLink": "Gricob/FunctionalTestBundle/Concerns.html", "link": "Gricob/FunctionalTestBundle/Concerns/InteractsWithConsole.html", "name": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithConsole", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithConsole", "fromLink": "Gricob/FunctionalTestBundle/Concerns/InteractsWithConsole.html", "link": "Gricob/FunctionalTestBundle/Concerns/InteractsWithConsole.html#method_runCommand", "name": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithConsole::runCommand", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithConsole", "fromLink": "Gricob/FunctionalTestBundle/Concerns/InteractsWithConsole.html", "link": "Gricob/FunctionalTestBundle/Concerns/InteractsWithConsole.html#method_getVerbosityLevel", "name": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithConsole::getVerbosityLevel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithConsole", "fromLink": "Gricob/FunctionalTestBundle/Concerns/InteractsWithConsole.html", "link": "Gricob/FunctionalTestBundle/Concerns/InteractsWithConsole.html#method_setVerbosityLevel", "name": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithConsole::setVerbosityLevel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithConsole", "fromLink": "Gricob/FunctionalTestBundle/Concerns/InteractsWithConsole.html", "link": "Gricob/FunctionalTestBundle/Concerns/InteractsWithConsole.html#method_isDecorated", "name": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithConsole::isDecorated", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithConsole", "fromLink": "Gricob/FunctionalTestBundle/Concerns/InteractsWithConsole.html", "link": "Gricob/FunctionalTestBundle/Concerns/InteractsWithConsole.html#method_setDecorated", "name": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithConsole::setDecorated", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithConsole", "fromLink": "Gricob/FunctionalTestBundle/Concerns/InteractsWithConsole.html", "link": "Gricob/FunctionalTestBundle/Concerns/InteractsWithConsole.html#method_getContainer", "name": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithConsole::getContainer", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithConsole", "fromLink": "Gricob/FunctionalTestBundle/Concerns/InteractsWithConsole.html", "link": "Gricob/FunctionalTestBundle/Concerns/InteractsWithConsole.html#method_ensureKernelBoot", "name": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithConsole::ensureKernelBoot", "doc": "&quot;&quot;"},
            
            {"type": "Trait", "fromName": "Gricob\\FunctionalTestBundle\\Concerns", "fromLink": "Gricob/FunctionalTestBundle/Concerns.html", "link": "Gricob/FunctionalTestBundle/Concerns/InteractsWithDatabase.html", "name": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithDatabase", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithDatabase", "fromLink": "Gricob/FunctionalTestBundle/Concerns/InteractsWithDatabase.html", "link": "Gricob/FunctionalTestBundle/Concerns/InteractsWithDatabase.html#method_setUpInteractsWithDatabase", "name": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithDatabase::setUpInteractsWithDatabase", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithDatabase", "fromLink": "Gricob/FunctionalTestBundle/Concerns/InteractsWithDatabase.html", "link": "Gricob/FunctionalTestBundle/Concerns/InteractsWithDatabase.html#method_createDatabaseSchema", "name": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithDatabase::createDatabaseSchema", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithDatabase", "fromLink": "Gricob/FunctionalTestBundle/Concerns/InteractsWithDatabase.html", "link": "Gricob/FunctionalTestBundle/Concerns/InteractsWithDatabase.html#method_dropDatabaseSchema", "name": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithDatabase::dropDatabaseSchema", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithDatabase", "fromLink": "Gricob/FunctionalTestBundle/Concerns/InteractsWithDatabase.html", "link": "Gricob/FunctionalTestBundle/Concerns/InteractsWithDatabase.html#method_loadFixtures", "name": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithDatabase::loadFixtures", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithDatabase", "fromLink": "Gricob/FunctionalTestBundle/Concerns/InteractsWithDatabase.html", "link": "Gricob/FunctionalTestBundle/Concerns/InteractsWithDatabase.html#method_getFixtureLoader", "name": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithDatabase::getFixtureLoader", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithDatabase", "fromLink": "Gricob/FunctionalTestBundle/Concerns/InteractsWithDatabase.html", "link": "Gricob/FunctionalTestBundle/Concerns/InteractsWithDatabase.html#method_loadFixtureClass", "name": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithDatabase::loadFixtureClass", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithDatabase", "fromLink": "Gricob/FunctionalTestBundle/Concerns/InteractsWithDatabase.html", "link": "Gricob/FunctionalTestBundle/Concerns/InteractsWithDatabase.html#method_getReference", "name": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithDatabase::getReference", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithDatabase", "fromLink": "Gricob/FunctionalTestBundle/Concerns/InteractsWithDatabase.html", "link": "Gricob/FunctionalTestBundle/Concerns/InteractsWithDatabase.html#method_assertDatabaseHas", "name": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithDatabase::assertDatabaseHas", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithDatabase", "fromLink": "Gricob/FunctionalTestBundle/Concerns/InteractsWithDatabase.html", "link": "Gricob/FunctionalTestBundle/Concerns/InteractsWithDatabase.html#method_assertDatabaseMissing", "name": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithDatabase::assertDatabaseMissing", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithDatabase", "fromLink": "Gricob/FunctionalTestBundle/Concerns/InteractsWithDatabase.html", "link": "Gricob/FunctionalTestBundle/Concerns/InteractsWithDatabase.html#method_executor", "name": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithDatabase::executor", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithDatabase", "fromLink": "Gricob/FunctionalTestBundle/Concerns/InteractsWithDatabase.html", "link": "Gricob/FunctionalTestBundle/Concerns/InteractsWithDatabase.html#method_ensureDoctrineFixturesBundle", "name": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithDatabase::ensureDoctrineFixturesBundle", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithDatabase", "fromLink": "Gricob/FunctionalTestBundle/Concerns/InteractsWithDatabase.html", "link": "Gricob/FunctionalTestBundle/Concerns/InteractsWithDatabase.html#method_getContainer", "name": "Gricob\\FunctionalTestBundle\\Concerns\\InteractsWithDatabase::getContainer", "doc": "&quot;&quot;"},
            
            {"type": "Trait", "fromName": "Gricob\\FunctionalTestBundle\\Concerns", "fromLink": "Gricob/FunctionalTestBundle/Concerns.html", "link": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html", "name": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests", "fromLink": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html", "link": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html#method_get", "name": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests::get", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests", "fromLink": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html", "link": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html#method_post", "name": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests::post", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests", "fromLink": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html", "link": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html#method_getJson", "name": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests::getJson", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests", "fromLink": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html", "link": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html#method_postJson", "name": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests::postJson", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests", "fromLink": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html", "link": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html#method_request", "name": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests::request", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests", "fromLink": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html", "link": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html#method_json", "name": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests::json", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests", "fromLink": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html", "link": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html#method_followRedirect", "name": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests::followRedirect", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests", "fromLink": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html", "link": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html#method_submit", "name": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests::submit", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests", "fromLink": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html", "link": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html#method_withHeaders", "name": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests::withHeaders", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests", "fromLink": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html", "link": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html#method_click", "name": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests::click", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests", "fromLink": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html", "link": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html#method_followingRedirects", "name": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests::followingRedirects", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests", "fromLink": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html", "link": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html#method_loginAs", "name": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests::loginAs", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests", "fromLink": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html", "link": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html#method_catchExceptions", "name": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests::catchExceptions", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests", "fromLink": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html", "link": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html#method_initClient", "name": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests::initClient", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests", "fromLink": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html", "link": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html#method_createUserToken", "name": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests::createUserToken", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests", "fromLink": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html", "link": "Gricob/FunctionalTestBundle/Concerns/MakesHttpRequests.html#method_getKernelOptions", "name": "Gricob\\FunctionalTestBundle\\Concerns\\MakesHttpRequests::getKernelOptions", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Gricob\\FunctionalTestBundle\\Constraints", "fromLink": "Gricob/FunctionalTestBundle/Constraints.html", "link": "Gricob/FunctionalTestBundle/Constraints/HasInDatabase.html", "name": "Gricob\\FunctionalTestBundle\\Constraints\\HasInDatabase", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Constraints\\HasInDatabase", "fromLink": "Gricob/FunctionalTestBundle/Constraints/HasInDatabase.html", "link": "Gricob/FunctionalTestBundle/Constraints/HasInDatabase.html#method___construct", "name": "Gricob\\FunctionalTestBundle\\Constraints\\HasInDatabase::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Constraints\\HasInDatabase", "fromLink": "Gricob/FunctionalTestBundle/Constraints/HasInDatabase.html", "link": "Gricob/FunctionalTestBundle/Constraints/HasInDatabase.html#method_matches", "name": "Gricob\\FunctionalTestBundle\\Constraints\\HasInDatabase::matches", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Constraints\\HasInDatabase", "fromLink": "Gricob/FunctionalTestBundle/Constraints/HasInDatabase.html", "link": "Gricob/FunctionalTestBundle/Constraints/HasInDatabase.html#method_failureDescription", "name": "Gricob\\FunctionalTestBundle\\Constraints\\HasInDatabase::failureDescription", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Constraints\\HasInDatabase", "fromLink": "Gricob/FunctionalTestBundle/Constraints/HasInDatabase.html", "link": "Gricob/FunctionalTestBundle/Constraints/HasInDatabase.html#method_toString", "name": "Gricob\\FunctionalTestBundle\\Constraints\\HasInDatabase::toString", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Gricob\\FunctionalTestBundle\\DependencyInjection\\Compiler", "fromLink": "Gricob/FunctionalTestBundle/DependencyInjection/Compiler.html", "link": "Gricob/FunctionalTestBundle/DependencyInjection/Compiler/PreventRemoveUnusedDefinitions.html", "name": "Gricob\\FunctionalTestBundle\\DependencyInjection\\Compiler\\PreventRemoveUnusedDefinitions", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\DependencyInjection\\Compiler\\PreventRemoveUnusedDefinitions", "fromLink": "Gricob/FunctionalTestBundle/DependencyInjection/Compiler/PreventRemoveUnusedDefinitions.html", "link": "Gricob/FunctionalTestBundle/DependencyInjection/Compiler/PreventRemoveUnusedDefinitions.html#method_process", "name": "Gricob\\FunctionalTestBundle\\DependencyInjection\\Compiler\\PreventRemoveUnusedDefinitions::process", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Gricob\\FunctionalTestBundle\\DependencyInjection", "fromLink": "Gricob/FunctionalTestBundle/DependencyInjection.html", "link": "Gricob/FunctionalTestBundle/DependencyInjection/Configuration.html", "name": "Gricob\\FunctionalTestBundle\\DependencyInjection\\Configuration", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\DependencyInjection\\Configuration", "fromLink": "Gricob/FunctionalTestBundle/DependencyInjection/Configuration.html", "link": "Gricob/FunctionalTestBundle/DependencyInjection/Configuration.html#method_getConfigTreeBuilder", "name": "Gricob\\FunctionalTestBundle\\DependencyInjection\\Configuration::getConfigTreeBuilder", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Gricob\\FunctionalTestBundle\\DependencyInjection", "fromLink": "Gricob/FunctionalTestBundle/DependencyInjection.html", "link": "Gricob/FunctionalTestBundle/DependencyInjection/FunctionalTestExtension.html", "name": "Gricob\\FunctionalTestBundle\\DependencyInjection\\FunctionalTestExtension", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\DependencyInjection\\FunctionalTestExtension", "fromLink": "Gricob/FunctionalTestBundle/DependencyInjection/FunctionalTestExtension.html", "link": "Gricob/FunctionalTestBundle/DependencyInjection/FunctionalTestExtension.html#method_load", "name": "Gricob\\FunctionalTestBundle\\DependencyInjection\\FunctionalTestExtension::load", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Gricob\\FunctionalTestBundle\\Enums", "fromLink": "Gricob/FunctionalTestBundle/Enums.html", "link": "Gricob/FunctionalTestBundle/Enums/Enum.html", "name": "Gricob\\FunctionalTestBundle\\Enums\\Enum", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Enums\\Enum", "fromLink": "Gricob/FunctionalTestBundle/Enums/Enum.html", "link": "Gricob/FunctionalTestBundle/Enums/Enum.html#method_raw", "name": "Gricob\\FunctionalTestBundle\\Enums\\Enum::raw", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Enums\\Enum", "fromLink": "Gricob/FunctionalTestBundle/Enums/Enum.html", "link": "Gricob/FunctionalTestBundle/Enums/Enum.html#method___callStatic", "name": "Gricob\\FunctionalTestBundle\\Enums\\Enum::__callStatic", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Gricob\\FunctionalTestBundle\\Enums", "fromLink": "Gricob/FunctionalTestBundle/Enums.html", "link": "Gricob/FunctionalTestBundle/Enums/VerbosityLevel.html", "name": "Gricob\\FunctionalTestBundle\\Enums\\VerbosityLevel", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Enums\\VerbosityLevel", "fromLink": "Gricob/FunctionalTestBundle/Enums/VerbosityLevel.html", "link": "Gricob/FunctionalTestBundle/Enums/VerbosityLevel.html#method_quiet", "name": "Gricob\\FunctionalTestBundle\\Enums\\VerbosityLevel::quiet", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Enums\\VerbosityLevel", "fromLink": "Gricob/FunctionalTestBundle/Enums/VerbosityLevel.html", "link": "Gricob/FunctionalTestBundle/Enums/VerbosityLevel.html#method_normal", "name": "Gricob\\FunctionalTestBundle\\Enums\\VerbosityLevel::normal", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Enums\\VerbosityLevel", "fromLink": "Gricob/FunctionalTestBundle/Enums/VerbosityLevel.html", "link": "Gricob/FunctionalTestBundle/Enums/VerbosityLevel.html#method_verbose", "name": "Gricob\\FunctionalTestBundle\\Enums\\VerbosityLevel::verbose", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Enums\\VerbosityLevel", "fromLink": "Gricob/FunctionalTestBundle/Enums/VerbosityLevel.html", "link": "Gricob/FunctionalTestBundle/Enums/VerbosityLevel.html#method_veryVerbose", "name": "Gricob\\FunctionalTestBundle\\Enums\\VerbosityLevel::veryVerbose", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Enums\\VerbosityLevel", "fromLink": "Gricob/FunctionalTestBundle/Enums/VerbosityLevel.html", "link": "Gricob/FunctionalTestBundle/Enums/VerbosityLevel.html#method_debug", "name": "Gricob\\FunctionalTestBundle\\Enums\\VerbosityLevel::debug", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Gricob\\FunctionalTestBundle", "fromLink": "Gricob/FunctionalTestBundle.html", "link": "Gricob/FunctionalTestBundle/FunctionalTestBundle.html", "name": "Gricob\\FunctionalTestBundle\\FunctionalTestBundle", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\FunctionalTestBundle", "fromLink": "Gricob/FunctionalTestBundle/FunctionalTestBundle.html", "link": "Gricob/FunctionalTestBundle/FunctionalTestBundle.html#method_build", "name": "Gricob\\FunctionalTestBundle\\FunctionalTestBundle::build", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Gricob\\FunctionalTestBundle\\Testing", "fromLink": "Gricob/FunctionalTestBundle/Testing.html", "link": "Gricob/FunctionalTestBundle/Testing/CommandResult.html", "name": "Gricob\\FunctionalTestBundle\\Testing\\CommandResult", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\CommandResult", "fromLink": "Gricob/FunctionalTestBundle/Testing/CommandResult.html", "link": "Gricob/FunctionalTestBundle/Testing/CommandResult.html#method___construct", "name": "Gricob\\FunctionalTestBundle\\Testing\\CommandResult::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\CommandResult", "fromLink": "Gricob/FunctionalTestBundle/Testing/CommandResult.html", "link": "Gricob/FunctionalTestBundle/Testing/CommandResult.html#method_fromCommandTester", "name": "Gricob\\FunctionalTestBundle\\Testing\\CommandResult::fromCommandTester", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\CommandResult", "fromLink": "Gricob/FunctionalTestBundle/Testing/CommandResult.html", "link": "Gricob/FunctionalTestBundle/Testing/CommandResult.html#method_assertOk", "name": "Gricob\\FunctionalTestBundle\\Testing\\CommandResult::assertOk", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\CommandResult", "fromLink": "Gricob/FunctionalTestBundle/Testing/CommandResult.html", "link": "Gricob/FunctionalTestBundle/Testing/CommandResult.html#method_assertSee", "name": "Gricob\\FunctionalTestBundle\\Testing\\CommandResult::assertSee", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\CommandResult", "fromLink": "Gricob/FunctionalTestBundle/Testing/CommandResult.html", "link": "Gricob/FunctionalTestBundle/Testing/CommandResult.html#method___call", "name": "Gricob\\FunctionalTestBundle\\Testing\\CommandResult::__call", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Gricob\\FunctionalTestBundle\\Testing", "fromLink": "Gricob/FunctionalTestBundle/Testing.html", "link": "Gricob/FunctionalTestBundle/Testing/FunctionalTestCase.html", "name": "Gricob\\FunctionalTestBundle\\Testing\\FunctionalTestCase", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\FunctionalTestCase", "fromLink": "Gricob/FunctionalTestBundle/Testing/FunctionalTestCase.html", "link": "Gricob/FunctionalTestBundle/Testing/FunctionalTestCase.html#method_setUp", "name": "Gricob\\FunctionalTestBundle\\Testing\\FunctionalTestCase::setUp", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\FunctionalTestCase", "fromLink": "Gricob/FunctionalTestBundle/Testing/FunctionalTestCase.html", "link": "Gricob/FunctionalTestBundle/Testing/FunctionalTestCase.html#method_tearDown", "name": "Gricob\\FunctionalTestBundle\\Testing\\FunctionalTestCase::tearDown", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\FunctionalTestCase", "fromLink": "Gricob/FunctionalTestBundle/Testing/FunctionalTestCase.html", "link": "Gricob/FunctionalTestBundle/Testing/FunctionalTestCase.html#method_setUpTraits", "name": "Gricob\\FunctionalTestBundle\\Testing\\FunctionalTestCase::setUpTraits", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\FunctionalTestCase", "fromLink": "Gricob/FunctionalTestBundle/Testing/FunctionalTestCase.html", "link": "Gricob/FunctionalTestBundle/Testing/FunctionalTestCase.html#method_tearDownTraits", "name": "Gricob\\FunctionalTestBundle\\Testing\\FunctionalTestCase::tearDownTraits", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\FunctionalTestCase", "fromLink": "Gricob/FunctionalTestBundle/Testing/FunctionalTestCase.html", "link": "Gricob/FunctionalTestBundle/Testing/FunctionalTestCase.html#method_getUsedTraits", "name": "Gricob\\FunctionalTestBundle\\Testing\\FunctionalTestCase::getUsedTraits", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\FunctionalTestCase", "fromLink": "Gricob/FunctionalTestBundle/Testing/FunctionalTestCase.html", "link": "Gricob/FunctionalTestBundle/Testing/FunctionalTestCase.html#method_getEnvironment", "name": "Gricob\\FunctionalTestBundle\\Testing\\FunctionalTestCase::getEnvironment", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\FunctionalTestCase", "fromLink": "Gricob/FunctionalTestBundle/Testing/FunctionalTestCase.html", "link": "Gricob/FunctionalTestBundle/Testing/FunctionalTestCase.html#method_setEnvironment", "name": "Gricob\\FunctionalTestBundle\\Testing\\FunctionalTestCase::setEnvironment", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\FunctionalTestCase", "fromLink": "Gricob/FunctionalTestBundle/Testing/FunctionalTestCase.html", "link": "Gricob/FunctionalTestBundle/Testing/FunctionalTestCase.html#method_getContainer", "name": "Gricob\\FunctionalTestBundle\\Testing\\FunctionalTestCase::getContainer", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\FunctionalTestCase", "fromLink": "Gricob/FunctionalTestBundle/Testing/FunctionalTestCase.html", "link": "Gricob/FunctionalTestBundle/Testing/FunctionalTestCase.html#method_getTestContainer", "name": "Gricob\\FunctionalTestBundle\\Testing\\FunctionalTestCase::getTestContainer", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\FunctionalTestCase", "fromLink": "Gricob/FunctionalTestBundle/Testing/FunctionalTestCase.html", "link": "Gricob/FunctionalTestBundle/Testing/FunctionalTestCase.html#method_ensureKernelBoot", "name": "Gricob\\FunctionalTestBundle\\Testing\\FunctionalTestCase::ensureKernelBoot", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\FunctionalTestCase", "fromLink": "Gricob/FunctionalTestBundle/Testing/FunctionalTestCase.html", "link": "Gricob/FunctionalTestBundle/Testing/FunctionalTestCase.html#method_getKernelOptions", "name": "Gricob\\FunctionalTestBundle\\Testing\\FunctionalTestCase::getKernelOptions", "doc": "&quot;&quot;"},
            
            {"type": "Trait", "fromName": "Gricob\\FunctionalTestBundle\\Testing", "fromLink": "Gricob/FunctionalTestBundle/Testing.html", "link": "Gricob/FunctionalTestBundle/Testing/RefreshDatabase.html", "name": "Gricob\\FunctionalTestBundle\\Testing\\RefreshDatabase", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\RefreshDatabase", "fromLink": "Gricob/FunctionalTestBundle/Testing/RefreshDatabase.html", "link": "Gricob/FunctionalTestBundle/Testing/RefreshDatabase.html#method_setUpRefreshDatabase", "name": "Gricob\\FunctionalTestBundle\\Testing\\RefreshDatabase::setUpRefreshDatabase", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\RefreshDatabase", "fromLink": "Gricob/FunctionalTestBundle/Testing/RefreshDatabase.html", "link": "Gricob/FunctionalTestBundle/Testing/RefreshDatabase.html#method_createDatabaseSchema", "name": "Gricob\\FunctionalTestBundle\\Testing\\RefreshDatabase::createDatabaseSchema", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Gricob\\FunctionalTestBundle\\Testing", "fromLink": "Gricob/FunctionalTestBundle/Testing.html", "link": "Gricob/FunctionalTestBundle/Testing/TestResponse.html", "name": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse", "fromLink": "Gricob/FunctionalTestBundle/Testing/TestResponse.html", "link": "Gricob/FunctionalTestBundle/Testing/TestResponse.html#method___construct", "name": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse::__construct", "doc": "&quot;TestResponse constructor.&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse", "fromLink": "Gricob/FunctionalTestBundle/Testing/TestResponse.html", "link": "Gricob/FunctionalTestBundle/Testing/TestResponse.html#method_fromBaseResponse", "name": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse::fromBaseResponse", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse", "fromLink": "Gricob/FunctionalTestBundle/Testing/TestResponse.html", "link": "Gricob/FunctionalTestBundle/Testing/TestResponse.html#method_getCrawler", "name": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse::getCrawler", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse", "fromLink": "Gricob/FunctionalTestBundle/Testing/TestResponse.html", "link": "Gricob/FunctionalTestBundle/Testing/TestResponse.html#method_setCrawler", "name": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse::setCrawler", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse", "fromLink": "Gricob/FunctionalTestBundle/Testing/TestResponse.html", "link": "Gricob/FunctionalTestBundle/Testing/TestResponse.html#method_assertOk", "name": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse::assertOk", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse", "fromLink": "Gricob/FunctionalTestBundle/Testing/TestResponse.html", "link": "Gricob/FunctionalTestBundle/Testing/TestResponse.html#method_assertRedirect", "name": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse::assertRedirect", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse", "fromLink": "Gricob/FunctionalTestBundle/Testing/TestResponse.html", "link": "Gricob/FunctionalTestBundle/Testing/TestResponse.html#method_assertInstanceOf", "name": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse::assertInstanceOf", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse", "fromLink": "Gricob/FunctionalTestBundle/Testing/TestResponse.html", "link": "Gricob/FunctionalTestBundle/Testing/TestResponse.html#method_assertNotFound", "name": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse::assertNotFound", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse", "fromLink": "Gricob/FunctionalTestBundle/Testing/TestResponse.html", "link": "Gricob/FunctionalTestBundle/Testing/TestResponse.html#method_assertForbidden", "name": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse::assertForbidden", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse", "fromLink": "Gricob/FunctionalTestBundle/Testing/TestResponse.html", "link": "Gricob/FunctionalTestBundle/Testing/TestResponse.html#method_assertUnauthorized", "name": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse::assertUnauthorized", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse", "fromLink": "Gricob/FunctionalTestBundle/Testing/TestResponse.html", "link": "Gricob/FunctionalTestBundle/Testing/TestResponse.html#method_assertStatusCode", "name": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse::assertStatusCode", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse", "fromLink": "Gricob/FunctionalTestBundle/Testing/TestResponse.html", "link": "Gricob/FunctionalTestBundle/Testing/TestResponse.html#method_assertSee", "name": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse::assertSee", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse", "fromLink": "Gricob/FunctionalTestBundle/Testing/TestResponse.html", "link": "Gricob/FunctionalTestBundle/Testing/TestResponse.html#method_assertSeeAll", "name": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse::assertSeeAll", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse", "fromLink": "Gricob/FunctionalTestBundle/Testing/TestResponse.html", "link": "Gricob/FunctionalTestBundle/Testing/TestResponse.html#method_assertDontSee", "name": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse::assertDontSee", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse", "fromLink": "Gricob/FunctionalTestBundle/Testing/TestResponse.html", "link": "Gricob/FunctionalTestBundle/Testing/TestResponse.html#method_assertDontSeeAny", "name": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse::assertDontSeeAny", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse", "fromLink": "Gricob/FunctionalTestBundle/Testing/TestResponse.html", "link": "Gricob/FunctionalTestBundle/Testing/TestResponse.html#method_assertExactJson", "name": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse::assertExactJson", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse", "fromLink": "Gricob/FunctionalTestBundle/Testing/TestResponse.html", "link": "Gricob/FunctionalTestBundle/Testing/TestResponse.html#method_decodeResponseJson", "name": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse::decodeResponseJson", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse", "fromLink": "Gricob/FunctionalTestBundle/Testing/TestResponse.html", "link": "Gricob/FunctionalTestBundle/Testing/TestResponse.html#method_assertViewIs", "name": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse::assertViewIs", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse", "fromLink": "Gricob/FunctionalTestBundle/Testing/TestResponse.html", "link": "Gricob/FunctionalTestBundle/Testing/TestResponse.html#method_getTwigCollector", "name": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse::getTwigCollector", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse", "fromLink": "Gricob/FunctionalTestBundle/Testing/TestResponse.html", "link": "Gricob/FunctionalTestBundle/Testing/TestResponse.html#method_getProfile", "name": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse::getProfile", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse", "fromLink": "Gricob/FunctionalTestBundle/Testing/TestResponse.html", "link": "Gricob/FunctionalTestBundle/Testing/TestResponse.html#method_getContainer", "name": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse::getContainer", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse", "fromLink": "Gricob/FunctionalTestBundle/Testing/TestResponse.html", "link": "Gricob/FunctionalTestBundle/Testing/TestResponse.html#method_setContainer", "name": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse::setContainer", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse", "fromLink": "Gricob/FunctionalTestBundle/Testing/TestResponse.html", "link": "Gricob/FunctionalTestBundle/Testing/TestResponse.html#method___get", "name": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse::__get", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse", "fromLink": "Gricob/FunctionalTestBundle/Testing/TestResponse.html", "link": "Gricob/FunctionalTestBundle/Testing/TestResponse.html#method___call", "name": "Gricob\\FunctionalTestBundle\\Testing\\TestResponse::__call", "doc": "&quot;&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


